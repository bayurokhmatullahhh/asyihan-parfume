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
            'essence_number' => 'required|integer|min:1|max:999',
            'quantity' => 'nullable|integer|min:1|max:10',
            'address' => 'nullable|string|max:1000',
            'city' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'expedition' => 'nullable|string|max:255',
            'payment_method' => 'nullable|string|max:255',
            'craftsman_note' => 'nullable|string|max:1000',
            'notes' => 'nullable|string|max:1000',
        ]);

        $quantity = $validated['quantity'] ?? 1;

        $specialOfferings = [
            101 => ['essence_name' => 'Sanctuary Mist - Hening Dugo', 'price' => 350000],
            102 => ['essence_name' => 'Reed Diffuser - Asih Rembulan', 'price' => 350000],
            103 => ['essence_name' => 'Lilin Sakral - Kemurnian Surya', 'price' => 350000],
            104 => ['essence_name' => 'Sacred Travel Discovery Set', 'price' => 350000],
        ];

        if (isset($specialOfferings[$validated['essence_number']])) {
            $essence = $specialOfferings[$validated['essence_number']];
        } else {
            $essence = $this->numerology->getArchetype($validated['essence_number']);
        }

        $price = $essence['price'] ?? 350000;
        $shippingExtra = ($validated['expedition'] ?? '') === 'same_day' ? 150000 : 0;
        $totalPrice = ($price * $quantity) + $shippingExtra;

        $order = Order::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'essence_number' => $validated['essence_number'],
            'essence_name' => $essence['essence_name'] ?? ($essence['name'] ?? 'Unknown'),
            'quantity' => $quantity,
            'total_price' => $totalPrice,
            'notes' => $validated['notes'] ?? $validated['address'] ?? null,
            'status' => 'pending',
        ]);

        // Build WhatsApp message
        $message = $this->buildWhatsAppMessage($order, $essence, $validated);
        $phone = '6281234567890'; // Default WhatsApp number
        $waUrl = 'https://wa.me/'.$phone.'?text='.urlencode($message);

        return redirect()->away($waUrl);
    }

    /**
     * Build WhatsApp order message.
     */
    protected function buildWhatsAppMessage(Order $order, ?array $essence, array $input = []): string
    {
        $totalFormatted = number_format($order->total_price, 0, ',', '.');
        $address = $input['address'] ?? '';
        $city = $input['city'] ?? '';
        $province = $input['province'] ?? '';
        $postalCode = $input['postal_code'] ?? '';
        $expedition = ($input['expedition'] ?? '') === 'same_day' ? 'Same-Day Midnight Hand Delivery (+ Rp 150.000)' : 'Express Sacred Courier (Gratis)';
        $payment = strtoupper($input['payment_method'] ?? 'QRIS Instant');
        $craftsmanNote = $input['craftsman_note'] ?? '';

        $fullAddressParts = array_filter([$address, $city, $province, $postalCode]);
        $addressStr = ! empty($fullAddressParts) ? implode(', ', $fullAddressParts) : ($order->notes ?? '-');

        return "✨ *PEMESANAN & PENYELARASAN TAKDIR ASYIHAN* ✨\n\n"
            ."Order ID: #{$order->id}\n"
            ."-------------------------------------\n"
            ."👤 *INFORMASI PEMESAN*\n"
            ."• Nama: {$order->name}\n"
            ."• Telepon/WA: {$order->phone}\n"
            .($order->email ? "• Email: {$order->email}\n" : '')
            ."\n"
            ."📍 *TITIK SINGGAH PENERIMAAN*\n"
            ."• Alamat: {$addressStr}\n"
            ."\n"
            ."📦 *DETAIL MAHAKARYA*\n"
            ."• Produk: {$order->essence_name}\n"
            ."• Jumlah: {$order->quantity} Unit\n"
            ."• Ekspedisi: {$expedition}\n"
            ."• Pembayaran: {$payment}\n"
            .($craftsmanNote ? "• Ukiran Mantra/Pesan: {$craftsmanNote}\n" : '')
            ."\n"
            ."💎 *TOTAL INVESTASI JIWA*: Rp {$totalFormatted}\n"
            ."-------------------------------------\n"
            .'*From Asih, Comes Essence.*';
    }
}
