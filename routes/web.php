<?php

use App\Http\Controllers\NumerologyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
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

// Order
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');

// Contact
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Legal Pages
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-of-service', [PageController::class, 'termsOfService'])->name('terms-of-service');
Route::get('/shipping-returns', [PageController::class, 'shippingReturns'])->name('shipping-returns');
