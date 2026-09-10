<?php

namespace App\Http\Controllers;

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
        $featured = $this->numerology->getArchetype(7); // The Seeker as featured

        return view('welcome', compact('archetypes', 'featured'));
    }

    /**
     * About page.
     */
    public function about(): View
    {
        return view('pages.about');
    }

    /**
     * Essence Collection page.
     */
    public function collection(): View
    {
        $archetypes = $this->numerology->getAllArchetypes();

        return view('pages.collection', compact('archetypes'));
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

        $allEssences = $this->numerology->getAllArchetypes();

        return view('pages.essence-detail', compact('essence', 'allEssences'));
    }

    /**
     * Ajian & Ritual page.
     */
    public function ajian(): View
    {
        $archetypes = $this->numerology->getAllArchetypes();

        return view('pages.ajian', compact('archetypes'));
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
