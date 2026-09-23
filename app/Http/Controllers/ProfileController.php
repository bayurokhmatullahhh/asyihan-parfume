<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\NumerologyService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __construct(
        protected NumerologyService $numerology
    ) {}

    /**
     * Display user profile and order history.
     */
    public function show(): View
    {
        /** @var User $user */
        $user = Auth::user();
        $orders = $user->orders()->latest()->with('items')->get();

        // Calculate personal essence archetype if birth_date is available
        $archetype = null;
        if ($user->birth_date) {
            $archetype = $this->numerology->getReading(
                $user->birth_date->format('Y-m-d'),
                $user->name
            );
        }

        return view('profile.show', compact('user', 'orders', 'archetype'));
    }

    /**
     * Show the profile edit form.
     */
    public function edit(): View
    {
        $user = Auth::user();

        return view('profile.edit', compact('user'));
    }

    /**
     * Update user profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:25'],
            'birth_date' => ['nullable', 'date'],
            'address' => ['nullable', 'string', 'max:1000'],
        ]);

        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profil dan frekuensi takdirmu berhasil diperbarui.');
    }

    /**
     * Update user password.
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        /** @var User $user */
        $user = Auth::user();
        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('success', 'Kata sandi sakral berhasil diperbarui.');
    }
}
