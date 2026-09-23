<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\NumerologyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * Get the cart query for currently authenticated user or session.
     */
    protected function getCartQuery()
    {
        if (Auth::check()) {
            return Cart::where('user_id', Auth::id());
        }

        $sessionId = session()->getId();

        return Cart::where('session_id', $sessionId);
    }

    /**
     * Display cart items.
     */
    public function index(): View
    {
        $items = $this->getCartQuery()->with('product')->get();
        $subtotal = $items->sum(fn ($item) => $item->subtotal);

        return view('cart.index', compact('items', 'subtotal'));
    }

    /**
     * Add item to cart.
     */
    public function add(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'product_id' => ['nullable', 'exists:products,id'],
            'essence_number' => ['nullable', 'integer'],
            'quantity' => ['nullable', 'integer', 'min:1', 'max:50'],
        ]);

        $quantity = $validated['quantity'] ?? 1;

        if (! empty($validated['product_id'])) {
            $product = Product::findOrFail($validated['product_id']);
        } elseif (! empty($validated['essence_number'])) {
            $product = Product::where('essence_number', $validated['essence_number'])->first();
            if (! $product) {
                // Look up in special offerings or archetypes
                $numerology = app(NumerologyService::class);
                $archetype = $numerology->getArchetype($validated['essence_number']);
                $product = Product::create([
                    'name' => $archetype['essence_name'] ?? 'Mahakarya #'.$validated['essence_number'],
                    'slug' => 'essence-'.$validated['essence_number'],
                    'category' => 'essence',
                    'essence_number' => $validated['essence_number'],
                    'price' => $archetype['price'] ?? 350000,
                    'stock' => 50,
                    'volume' => '50ml',
                    'image' => 'images/bottle/bottle_'.$validated['essence_number'].'.png',
                    'is_active' => true,
                ]);
            }
        } else {
            if ($request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Produk tidak ditemukan.'], 422);
            }

            return back()->with('error', 'Produk tidak valid.');
        }

        $query = $this->getCartQuery()->where('product_id', $product->id);
        $existing = $query->first();

        if ($existing) {
            $existing->increment('quantity', $quantity);
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'session_id' => Auth::check() ? null : session()->getId(),
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }

        $totalCount = $this->getCartQuery()->sum('quantity');

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "{$product->name} berhasil dimasukkan ke peti sakral.",
                'cart_count' => $totalCount,
                'product_name' => $product->name,
            ]);
        }

        return redirect()->route('cart.index')->with('success', "{$product->name} berhasil ditambahkan ke keranjang pesanan.");
    }

    /**
     * Remove multiple selected items from cart.
     */
    public function removeSelected(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer',
        ]);

        $this->getCartQuery()->whereIn('id', $validated['ids'])->delete();

        if ($request->wantsJson()) {
            $totalCount = $this->getCartQuery()->sum('quantity');

            return response()->json([
                'success' => true,
                'message' => 'Item terpilih berhasil dikeluarkan dari keranjang.',
                'cart_count' => $totalCount,
            ]);
        }

        return back()->with('info', 'Item terpilih berhasil dikeluarkan dari keranjang.');
    }

    /**
     * Clear all items in cart (for empty state testing simulation).
     */
    public function clear(): RedirectResponse
    {
        $this->getCartQuery()->delete();

        return redirect()->route('cart.index')->with('info', 'Peti persembahan telah dikosongkan untuk simulasi.');
    }

    /**
     * Update cart item quantity.
     */
    public function update(Request $request, Cart $cart): RedirectResponse|JsonResponse
    {
        // Check ownership
        if (Auth::check() && $cart->user_id !== Auth::id()) {
            abort(403);
        } elseif (! Auth::check() && $cart->session_id !== session()->getId()) {
            abort(403);
        }

        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:50'],
        ]);

        $cart->update(['quantity' => $validated['quantity']]);

        if ($request->wantsJson()) {
            $items = $this->getCartQuery()->with('product')->get();
            $subtotal = $items->sum(fn ($item) => $item->subtotal);

            return response()->json([
                'success' => true,
                'item_subtotal' => $cart->formatted_subtotal,
                'cart_subtotal' => 'Rp '.number_format($subtotal, 0, ',', '.'),
            ]);
        }

        return back()->with('success', 'Jumlah persembahan berhasil diperbarui.');
    }

    /**
     * Remove item from cart.
     */
    public function remove(Cart $cart): RedirectResponse
    {
        if (Auth::check() && $cart->user_id !== Auth::id()) {
            abort(403);
        } elseif (! Auth::check() && $cart->session_id !== session()->getId()) {
            abort(403);
        }

        $cart->delete();

        return back()->with('info', 'Item dikeluarkan dari keranjang persembahan.');
    }

    /**
     * Process checkout from cart.
     */
    public function checkout(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'selected_ids' => 'nullable|array',
            'selected_ids.*' => 'integer',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:25',
            'email' => 'nullable|email|max:255',
            'address' => 'required|string|max:1000',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'expedition' => 'nullable|string|max:100',
            'payment_method' => 'nullable|string|max:100',
            'craftsman_note' => 'nullable|string|max:1000',
        ]);

        $query = $this->getCartQuery()->with('product');

        if (! empty($validated['selected_ids'])) {
            $query->whereIn('id', $validated['selected_ids']);
        }

        $items = $query->get();

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Silakan pilih minimal satu item persembahan untuk diproses.');
        }

        $subtotal = $items->sum(fn ($i) => $i->subtotal);
        $shippingCost = ($validated['expedition'] ?? '') === 'same_day' ? 150000 : 0;
        $totalPrice = $subtotal + $shippingCost;

        $order = DB::transaction(function () use ($validated, $items, $shippingCost, $totalPrice) {
            $firstProduct = $items->first()->product;

            $order = Order::create([
                'user_id' => Auth::id(),
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'email' => $validated['email'] ?? null,
                'essence_number' => $firstProduct?->essence_number ?? 1,
                'essence_name' => $items->count() > 1 ? ($firstProduct->name.' + '.($items->count() - 1).' item lainnya') : $firstProduct->name,
                'quantity' => $items->sum('quantity'),
                'total_price' => $totalPrice,
                'address' => $validated['address'],
                'city' => $validated['city'],
                'province' => $validated['province'],
                'postal_code' => $validated['postal_code'] ?? null,
                'expedition' => $validated['expedition'] ?? 'express',
                'shipping_cost' => $shippingCost,
                'payment_method' => $validated['payment_method'] ?? 'midtrans',
                'payment_status' => 'pending',
                'craftsman_note' => $validated['craftsman_note'] ?? null,
                'status' => 'pending',
            ]);

            foreach ($items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'essence_number' => $item->product->essence_number,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                    'subtotal' => $item->subtotal,
                ]);
            }

            // Remove only the checked-out items from cart
            $this->getCartQuery()->whereIn('id', $items->pluck('id'))->delete();

            return $order;
        });

        // Store last order id for guest tracking
        session()->put('last_order_id', $order->id);

        return redirect()->route('checkout.payment', $order)
            ->with('success', "Pesanan #{$order->order_number} berhasil dibuat. Silakan selesaikan pembayaran sakral Anda.");
    }
}
