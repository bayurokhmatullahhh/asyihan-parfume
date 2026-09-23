<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Show customer login form.
     */
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * Show secret admin portal login form.
     */
    public function showAdminLoginForm(): View
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    /**
     * Handle login submission.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            /** @var User $user */
            $user = Auth::user();

            if ($request->input('is_admin_portal') && $user->isAdmin()) {
                return redirect()->intended(route('admin.dashboard'));
            }

            if ($user->isAdmin()) {
                return redirect()->intended(route('admin.dashboard'));
            }

            return redirect()->intended(route('profile'))->with('success', 'Selamat datang kembali, '.$user->name.'. Energi takdirmu telah tersinkronisasi.');
        }

        throw ValidationException::withMessages([
            'email' => __('Kombinasi email dan kata sandi tidak cocok dengan catatan sakral kami.'),
        ]);
    }

    /**
     * Handle user logout.
     */
    public function logout(Request $request): RedirectResponse
    {
        $isAdmin = Auth::check() && Auth::user()->isAdmin();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($isAdmin) {
            return redirect()->route('admin.login')->with('info', 'Gerbang astral telah ditutup.');
        }

        return redirect()->route('home')->with('info', 'Anda telah keluar dari ruang sakral.');
    }
}
