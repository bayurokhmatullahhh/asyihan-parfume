<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductManagementController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index(Request $request): View
    {
        $query = Product::with('categoryRelation')->latest();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('tagline', 'like', "%{$search}%");
            });
        }

        $products = $query->paginate(15)->withQueryString();
        $categories = Category::orderBy('sort_order')->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    /**
     * Show form for creating a new product.
     */
    public function create(): View
    {
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'category' => 'nullable|string|max:50',
            'essence_number' => 'nullable|integer|min:1|max:999',
            'tagline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'soul_character' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'volume' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        // Sync category string column for backwards compatibility
        if (! empty($validated['category_id'])) {
            $cat = Category::find($validated['category_id']);
            if ($cat) {
                $validated['category'] = $cat->slug;
            }
        } elseif (empty($validated['category'])) {
            $validated['category'] = 'essence';
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        } else {
            $validated['image'] = 'images/bottle/bottle_1.png';
        }

        $validated['slug'] = Str::slug($validated['name']).'-'.rand(100, 999);
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['is_featured'] = $request->boolean('is_featured', false);

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', "Mahakarya {$validated['name']} berhasil ditambahkan ke altar produk.");
    }

    /**
     * Show form for editing the specified product.
     */
    public function edit(Product $product): View
    {
        $categories = Category::orderBy('sort_order')->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'category' => 'nullable|string|max:50',
            'essence_number' => 'nullable|integer|min:1|max:999',
            'tagline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'soul_character' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'volume' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        // Sync category string column
        if (! empty($validated['category_id'])) {
            $cat = Category::find($validated['category_id']);
            if ($cat) {
                $validated['category'] = $cat->slug;
            }
        }

        // Handle image upload or keep old
        if ($request->hasFile('image')) {
            // Delete old file if stored in storage
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        } else {
            unset($validated['image']);
        }

        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_featured'] = $request->boolean('is_featured');

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', "Mahakarya {$product->name} berhasil disempurnakan.");
    }

    /**
     * Toggle product active status.
     */
    public function toggleActive(Product $product): RedirectResponse
    {
        $product->update(['is_active' => ! $product->is_active]);

        return back()->with('success', "Status aktif produk {$product->name} berhasil diperbarui.");
    }

    /**
     * Remove the specified product.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $name = $product->name;

        // Delete uploaded image if exists
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', "Produk {$name} telah ditarik dari peredaran.");
    }
}
