<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\BuildComponent;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/',
    [ProductController::class, 'index']
    /*
        function () {
            return Inertia::render('HomePage', [
                'canLogin' => Route::has('login'),
                'canRegister' => Route::has('register'),
                'laravelVersion' => Application::VERSION,
                'phpVersion' => PHP_VERSION,
            ]);
        }
    */
)->name('home');

Route::get(
    '/products/{slug:slug}',
    [ProductController::class, 'show']
)->name('product');

Route::get(
    'add-new-product',
    [ProductController::class, 'create']
)->name('add.product');

Route::post(
    'add-new-product',
    [ProductController::class, 'store']
)->name('store.product');

// For Developping Only
Route::get('/cb', [BuildComponent::class, 'show'])->name('component.build');
Route::post('/cb', [BuildComponent::class, 'image'])->name('component.build');

Route::get('/cards', function () {
    return Inertia::render('Build/Cards')
        ->with('success', 'test for flash');
})->name('cards');
// For Developping Only

Route::get('/about', function () {
    return Inertia::render('HomePage', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('about');

Route::get('/shop', function () {
    return Inertia::render('ShopPage', []);
})->name('shop');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
