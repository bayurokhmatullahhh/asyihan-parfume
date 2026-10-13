<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Product;
use App\Services\NumerologyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
     * Store contact message (Pesan Jiwa) from visitors.
     */
    public function sendContactMessage(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:25',
            'birth_info' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $message = ContactMessage::create([
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'birth_info' => $validated['birth_info'] ?? null,
            'category' => $validated['category'],
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
        ]);

        // Build clean WhatsApp URL
        $cleanPhone = preg_replace('/[^0-9]/', '', $validated['phone']);
        $text = "✨ *PESAN KONSULTASI ASYIHAN* ✨\n\n"
            ."Nama: {$validated['name']}\n"
            ."Kontak WA: {$validated['phone']}\n"
            .'Tanggal Lahir / Angka: '.($validated['birth_info'] ?: '-')."\n"
            ."Fokus: {$validated['category']}\n\n"
            ."Pesan:\n{$validated['message']}\n\n"
            ."---\nFrom Asih, Comes Essence.";

        $waUrl = 'https://wa.me/628112144113?text='.urlencode($text);

        return response()->json([
            'success' => true,
            'message' => 'Pesan jiwa Anda telah berhasil kami catat dalam arsip sakral.',
            'whatsapp_url' => $waUrl,
            'data' => $message,
        ]);
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
