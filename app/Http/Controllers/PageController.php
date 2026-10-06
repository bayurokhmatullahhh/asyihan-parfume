<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\NumerologyService;
use Illuminate\View\View;

class PageController extends Controller
{
    public function __construct(
        protected NumerologyService $numerology
    ) {}

    /**
     * Home page.
     */
    public function home(): View
    {
        $archetypes = $this->numerology->getAllArchetypes();
        $featured = $this->numerology->getArchetype(7);
        $featuredProducts = Product::where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('essence_number')
            ->get();
        $products = Product::where('is_active', true)
            ->orderBy('essence_number')
            ->get()
            ->keyBy('essence_number');

        return view('welcome', compact('archetypes', 'featured', 'featuredProducts', 'products'));
    }

    /**
     * About page.
     */
    public function about(): View
    {
        return view('pages.about');
    }

    /**
     * Essence Collection page — products from database merged with archetype data.
     */
    public function collection(): View
    {
        $archetypes = $this->numerology->getAllArchetypes();
        $products = Product::where('is_active', true)
            ->orderBy('essence_number')
            ->get()
            ->keyBy('essence_number');

        return view('pages.collection', compact('archetypes', 'products'));
    }

    /**
     * Essence Detail page.
     */
    public function essenceDetail(string $slug): View
    {
        $essence = $this->numerology->getArchetypeBySlug($slug);

        if (! $essence) {
            abort(404);
        }

        $product = Product::where('is_active', true)
            ->where(function ($query) use ($slug, $essence) {
                $query->where('slug', 'like', "%{$slug}%")
                    ->orWhere('essence_number', $essence['number'] ?? null);
            })
            ->first();

        $allEssences = $this->numerology->getAllArchetypes();

        return view('pages.essence-detail', compact('essence', 'product', 'allEssences'));
    }

    /**
     * Ajian & Ritual page.
     */
    public function ajian(): View
    {
        $archetypes = $this->numerology->getAllArchetypes();
        $products = Product::where('is_active', true)
            ->orderBy('essence_number')
            ->get()
            ->keyBy('essence_number');

        return view('pages.ajian', compact('archetypes', 'products'));
    }

    /**
     * Contact page.
     */
    public function contact(): View
    {
        return view('pages.contact');
    }

    /**
     * Privacy Policy page.
     */
    public function privacyPolicy(): View
    {
        return view('pages.privacy-policy');
    }

    /**
     * Terms of Service page.
     */
    public function termsOfService(): View
    {
        return view('pages.terms-of-service');
    }

    /**
     * Shipping & Returns page.
     */
    public function shippingReturns(): View
    {
        return view('pages.shipping-returns');
    }
}
