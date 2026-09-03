<?php

namespace App\Http\Controllers;

use App\Services\NumerologyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NumerologyController extends Controller
{
    public function __construct(
        protected NumerologyService $numerology
    ) {}

    /**
     * Show the calculator page.
     */
    public function index(): View
    {
        return view('pages.calculator', [
            'archetypes' => $this->numerology->getAllArchetypes(),
        ]);
    }

    /**
     * Calculate numerology from birth date (AJAX).
     */
    public function calculate(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date|before_or_equal:today',
        ]);

        try {
            $reading = $this->numerology->getReading(
                $validated['birth_date'],
                $validated['name']
            );

            return response()->json([
                'success' => true,
                'data' => $reading,
            ]);
        } catch (\InvalidArgumentException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Tanggal lahir tidak valid.',
            ], 422);
        }
    }
}
