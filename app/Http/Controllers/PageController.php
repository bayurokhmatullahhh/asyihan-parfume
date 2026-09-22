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

    /**
     * Account page (Akun Saya).
     */
    public function account(): View
    {
        $archetypes = $this->numerology->getAllArchetypes();

        // Demo orders using existing catalog/archetype data
        $orders = [
            [
                'id' => 'ASY-8921-7701',
                'date' => '28 September 2026',
                'total' => 700000,
                'status' => 'diterima',
                'status_label' => 'TERKIRIM — RESESI SAKRAL UTUH',
                'items' => [
                    [
                        'name' => 'Essence VII — The Seeker',
                        'desc' => '50ml Extrait Pure (Konsentrasi Jiwa 35%) • Resonansi Sakra Pon',
                        'detail' => 'Kayu Gaharu Pelangi, Akar Taji Kura, Jatamansi Saring & Ritur Kemasyur Indita',
                        'qty' => 1,
                        'price' => 450000,
                        'image' => 'images/bottle/bottle_7.jpg',
                    ],
                    [
                        'name' => 'Reed Diffuser — Asih Rembulan',
                        'desc' => '150ml Ritual Ruang Beranangi • Rotan Hitam Celup Pinus',
                        'detail' => 'Melati Putih Malam, Bayur Istana Puri, Cendana Pasang Keramat',
                        'qty' => 1,
                        'price' => 250000,
                        'image' => 'images/bottle/bottle_3.jpg',
                    ],
                ],
            ],
            [
                'id' => 'ASY-8804-6312',
                'date' => '03 Oktober 2026',
                'total' => 350000,
                'status' => 'dikirim',
                'status_label' => 'DIKIRIM & DIKAWALKAN MANTRA',
                'items' => [
                    [
                        'name' => 'Sanctuary Mist — Hening Dago',
                        'desc' => '100ml Aura Cleanser • Tahap Harmonisasi Alkimia Hari ke 3',
                        'detail' => 'Risat Gunung Manglayang, Kelar Basuki Olde, Minyak Kratom Putik Sari',
                        'qty' => 1,
                        'price' => 350000,
                        'image' => 'images/bottle/bottle_2.jpg',
                    ],
                ],
            ],
            [
                'id' => 'ASY-7619-2041',
                'date' => '14 Agustus 2026',
                'total' => 350000,
                'status' => 'selesai',
                'status_label' => 'SELESAI PURNA',
                'items' => [
                    [
                        'name' => 'Sacred Travel Discovery Set',
                        'desc' => '3 x 10ml Extract Vial (Formula I, IV, VII) • Botol Kristal Hitam',
                        'detail' => 'Pejantan eksklusivo spora jalan-jaran numerologi fluxan firma',
                        'qty' => 1,
                        'price' => 350000,
                        'image' => 'images/bottle/bottle_5.jpg',
                    ],
                ],
            ],
        ];

        return view('pages.account', compact('archetypes', 'orders'));
    }

    /**
     * Track Package page (Lacak Paket).
     */
    public function trackPackage(string $orderId): View
    {
        // Demo tracking data — in a real app this would come from the database
        $trackingData = [
            'ASY-8921-7701' => [
                'order_id' => 'ASY-8921-7701',
                'order_date' => '12 September 2026 • 19:00 WIB',
                'estimated_arrival' => '16 September 2026',
                'status' => 'dikirim',
                'status_label' => 'DALAM PERJALANAN',
                'courier' => 'Kurir JNE',
                'tracking_number' => 'JN012345678990',
                'service' => 'Layanan Sacred Express',
                'ship_date' => '14 September 2026',
                'ship_time' => 'Sesudah Tentak 14:00 WIB',
                'timeline' => [
                    [
                        'status' => 'Paket telah sampai di kota tujuan',
                        'detail' => 'Bandung, Jawa Barat [Hub Penerima Peringkat]',
                        'date' => '15 September 2026, 14:16',
                        'active' => true,
                    ],
                    [
                        'status' => 'Dalam perjalanan',
                        'detail' => 'Jakarta — Bandung [Prasadik Sakur Tikt Transek]',
                        'date' => '14 September 2026, 18:22',
                        'active' => true,
                    ],
                    [
                        'status' => 'Paket telah tiba di hub',
                        'detail' => 'Jakarta (Gateway) - Jaldin Utama',
                        'date' => '13 September 2026, 14:17',
                        'active' => true,
                    ],
                    [
                        'status' => 'Paket sedang diproses',
                        'detail' => 'Sanctum Asyihan — Pickup by Courier',
                        'date' => '12 September 2026, 20:01',
                        'active' => true,
                    ],
                ],
                'items' => [
                    [
                        'name' => 'ESSENCE VII — THE SEEKER',
                        'desc' => 'Kayu Gaharu Singkil • Qty: 1',
                        'price' => 350000,
                        'image' => 'images/bottle/bottle_7.jpg',
                    ],
                    [
                        'name' => 'ESSENCE V — THE ADVENTURER',
                        'desc' => 'Sea Pir Barur 50ml • Qty: 1',
                        'price' => 350000,
                        'image' => 'images/bottle/bottle_5.jpg',
                    ],
                ],
                'subtotal' => 700000,
                'shipping' => 0,
                'total' => 700000,
                'recipient' => [
                    'name' => 'Najmi Ayu Fajriyah',
                    'address' => 'Jl. Airleel Km. 21, Jml. Gandapid, Kota Bandung, Jawa Barat 40412',
                ],
                'payment_method' => 'Transfer Bank (BCA)',
            ],
            'ASY-8804-6312' => [
                'order_id' => 'ASY-8804-6312',
                'order_date' => '03 Oktober 2026 • 10:00 WIB',
                'estimated_arrival' => '07 Oktober 2026',
                'status' => 'dikirim',
                'status_label' => 'DALAM PERJALANAN',
                'courier' => 'Kurir JNE',
                'tracking_number' => 'JN098765432110',
                'service' => 'Layanan Sacred Express',
                'ship_date' => '04 Oktober 2026',
                'ship_time' => 'Sesudah Tentak 09:00 WIB',
                'timeline' => [
                    [
                        'status' => 'Paket sedang dikirim ke alamat tujuan',
                        'detail' => 'Bandung, Jawa Barat',
                        'date' => '06 Oktober 2026, 08:30',
                        'active' => true,
                    ],
                    [
                        'status' => 'Dalam perjalanan',
                        'detail' => 'Jakarta — Bandung',
                        'date' => '05 Oktober 2026, 14:00',
                        'active' => true,
                    ],
                    [
                        'status' => 'Paket diambil kurir',
                        'detail' => 'Sanctum Asyihan — Pickup',
                        'date' => '04 Oktober 2026, 09:15',
                        'active' => true,
                    ],
                ],
                'items' => [
                    [
                        'name' => 'SANCTUARY MIST — HENING DAGO',
                        'desc' => '100ml Aura Cleanser • Qty: 1',
                        'price' => 350000,
                        'image' => 'images/bottle/bottle_2.jpg',
                    ],
                ],
                'subtotal' => 350000,
                'shipping' => 0,
                'total' => 350000,
                'recipient' => [
                    'name' => 'Najmi Ayu Fajriyah',
                    'address' => 'Jl. Airleel Km. 21, Jml. Gandapid, Kota Bandung, Jawa Barat 40412',
                ],
                'payment_method' => 'Transfer Bank (BCA)',
            ],
        ];

        $tracking = $trackingData[$orderId] ?? null;

        if (! $tracking) {
            abort(404);
        }

        return view('pages.track-package', compact('tracking'));
    }
}
