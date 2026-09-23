<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LeadManagementController;
use App\Http\Controllers\Admin\OrderManagementController;
use App\Http\Controllers\Admin\ProductManagementController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\NumerologyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [PageController::class, 'home'])->name('home');

// About
Route::get('/about', [PageController::class, 'about'])->name('about');

// Numerology Calculator
Route::get('/calculator', [NumerologyController::class, 'index'])->name('calculator');
Route::post('/calculator/calculate', [NumerologyController::class, 'calculate'])->name('calculator.calculate');

// Essence Collection
Route::get('/collection', [PageController::class, 'collection'])->name('collection');
Route::get('/essence/{slug}', [PageController::class, 'essenceDetail'])->name('essence.detail');

// Ajian & Ritual
Route::get('/ajian', [PageController::class, 'ajian'])->name('ajian');

// Order & Tracking
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('order.show');

// Payment (Midtrans Snap & Webhook)
Route::get('/checkout/payment/{order}', [PaymentController::class, 'show'])->name('checkout.payment');
Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
Route::get('/payment/finish', [PaymentController::class, 'finish'])->name('payment.finish');

// Contact
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Legal Pages
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-of-service', [PageController::class, 'termsOfService'])->name('terms-of-service');
Route::get('/shipping-returns', [PageController::class, 'shippingReturns'])->name('shipping-returns');

// Customer Auth Routes (Guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Logout (Authenticated)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Customer Profile
Route::middleware('auth')->prefix('profile')->name('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'show']);
    Route::get('/edit', [ProfileController::class, 'edit'])->name('.edit');
    Route::put('/', [ProfileController::class, 'update'])->name('.update');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('.password');
});

// Cart & Checkout (Guest & Auth)
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add', [CartController::class, 'add'])->name('add');
    Route::put('/{cart}', [CartController::class, 'update'])->name('update');
    Route::delete('/remove-selected', [CartController::class, 'removeSelected'])->name('removeSelected');
    Route::post('/clear', [CartController::class, 'clear'])->name('clear');
    Route::delete('/{cart}', [CartController::class, 'remove'])->name('remove');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
});

// Secret Admin Astral Gateway
Route::prefix('astral-gateway')->name('admin.')->group(function () {
    // Admin login (public but secret URL)
    Route::get('/login', [LoginController::class, 'showAdminLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    // Admin Protected Area
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Orders
        Route::get('/orders', [OrderManagementController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [OrderManagementController::class, 'show'])->name('orders.show');
        Route::put('/orders/{order}/status', [OrderManagementController::class, 'updateStatus'])->name('orders.status');
        Route::delete('/orders/{order}', [OrderManagementController::class, 'destroy'])->name('orders.destroy');

        // Leads (Calculator data capture)
        Route::get('/leads', [LeadManagementController::class, 'index'])->name('leads.index');
        Route::delete('/leads/{lead}', [LeadManagementController::class, 'destroy'])->name('leads.destroy');

        // Users
        Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
        Route::put('/users/{user}/role', [UserManagementController::class, 'toggleRole'])->name('users.toggle-role');
        Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');

        // Products
        Route::resource('products', ProductManagementController::class)->except(['show']);
        Route::put('/products/{product}/toggle', [ProductManagementController::class, 'toggleActive'])->name('products.toggle');
    });
});
