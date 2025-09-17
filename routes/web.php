<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CapabilityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\ServiceController;

// ----- Default Laravel / auth-stuff (non-localized) -----
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// ----- Cookie consent (non-localized) -----
Route::post('/cookies/accept', [CookieController::class, 'acceptCookies'])->name('cookies.accept');
Route::post('/cookies/reject', [CookieController::class, 'rejectCookies'])->name('cookies.reject');
Route::post('/cookies/settings', [CookieController::class, 'updateCookieSettings'])->name('cookies.update-settings');

Route::get('/test-cookies', fn() => view('test-cookies'))->name('test-cookies');

// Redirect root to Bulgarian homepage (or swap to your detector later)
Route::redirect('/', '/bg');

// ----- Localized routes -----
// Use the 'locale' middleware ALIAS you registered in bootstrap/app.php.
// You can also add ->whereIn('locale', ['bg','en']) if you prefer over regex.
Route::prefix('{locale}')
    ->where(['locale' => 'bg|en'])
    ->middleware('locale')
    ->group(function () {

        // Legal pages
        Route::get('/privacy-policy', [LegalController::class, 'privacyPolicy'])->name('privacy-policy');
        Route::get('/cookie-policy', [LegalController::class, 'cookiePolicy'])->name('cookie-policy');
        Route::get('/terms-of-service', [LegalController::class, 'termsOfService'])->name('terms-of-service');
        Route::get('/cookie-settings', [CookieController::class, 'cookieSettings'])->name('cookie-settings');

        // Main site
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/about', [AboutController::class, 'index'])->name('about');
        Route::get('/services', [ServiceController::class, 'index'])->name('services');

        Route::get('/services/p/{id}-{slug}', [ServiceController::class, 'show'])
            ->whereNumber('id')
            ->where('slug', '[A-Za-z0-9-]+')
            ->name('services.show');

        Route::get('/capabilities', [CapabilityController::class, 'index'])->name('capabilities');
        Route::get('/references', [ReferenceController::class, 'index'])->name('references');
        Route::get('/news', [NewsController::class, 'index'])->name('news');

        Route::get('/contact', [ContactController::class, 'index'])->name('contact');
        Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    });
