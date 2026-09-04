<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\NumerologyService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function __construct(
        protected NumerologyService $numerology
    ) {}

    /**
     * Show the order page.
     */
    public function index(): View
    {
        $archetypes = $this->numerology->getAllArchetypes();

        return view('pages.order', compact('archetypes'));
    }

    /**
     * Store a new order and redirect to WhatsApp.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'essence_number' => 'required|integer|min:1|max:9',
            'quantity' => 'required|integer|min:1|max:10',
            'notes' => 'nullable|string|max:1000',
        ]);

        $essence = $this->numerology->getArchetype($validated['essence_number']);

        $order = Order::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'essence_number' => $validated['essence_number'],
            'essence_name' => $essence['essence_name'] ?? 'Unknown',
            'quantity' => $validated['quantity'],
            'total_price' => ($essence['price'] ?? 1380000) * $validated['quantity'],
            'notes' => $validated['notes'] ?? null,
            'status' => 'pending',
        ]);

        // Build WhatsApp message
        $message = $this->buildWhatsAppMessage($order, $essence);
        $phone = '6281234567890'; // Default WhatsApp number
        $waUrl = 'https://wa.me/'.$phone.'?text='.urlencode($message);

        return redirect()->away($waUrl);
    }

    /**
     * Build WhatsApp order message.
     */
    protected function buildWhatsAppMessage(Order $order, ?array $essence): string
    {
        $totalFormatted = number_format($order->total_price, 0, ',', '.');

        return "✨ *ORDER ASYIHAN* ✨\n\n"
            ."Nama: {$order->name}\n"
            ."Telepon: {$order->phone}\n"
            .($order->email ? "Email: {$order->email}\n" : '')
            ."\n"
            ."Produk: {$order->essence_name}\n"
            ."Jumlah: {$order->quantity}\n"
            ."Total: Rp {$totalFormatted}\n"
            .($order->notes ? "\nCatatan: {$order->notes}\n" : '')
            ."\n"
            ."Order ID: #{$order->id}\n"
            ."---\n"
            .'From Asih, Comes Essence.';
    }
}
