<?php

use App\Http\Controllers\CookieController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CapabilityController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;

// Default Laravel routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// METALIK WEBSITE ROUTES - ADD THIS SECTION
// Redirect root to Bulgarian homepage
Route::get('/', function () {
    return redirect('/bg');
});

// Multilingual routes
Route::group(['prefix' => '{locale}', 'where' => ['locale' => 'bg|en']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/services', [ServiceController::class, 'index'])->name('services');
    Route::get('/services/p/{id}-{slug}', [ServiceController::class, 'show'])->name('services.show');
    Route::get('/capabilities', [CapabilityController::class, 'index'])->name('capabilities');
    Route::get('/references', [ReferenceController::class, 'index'])->name('references');
    Route::get('/news', [NewsController::class, 'index'])->name('news');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
});

// Legal pages
Route::get('/privacy-policy', [LegalController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/cookie-policy', [LegalController::class, 'cookiePolicy'])->name('cookie-policy');
Route::get('/terms-of-service', [LegalController::class, 'termsOfService'])->name('terms-of-service');
Route::get('/cookie-settings', [CookieController::class, 'cookieSettings'])->name('cookie-settings');

// Cookie consent (outside multilingual group)
Route::post('/cookies/accept', [CookieController::class, 'acceptCookies'])->name('cookies.accept');
Route::post('/cookies/reject', [CookieController::class, 'rejectCookies'])->name('cookies.reject');
Route::post('/cookies/settings', [CookieController::class, 'updateCookieSettings'])->name('cookies.update-settings');

// Test cookie route.
Route::get('/test-cookies', function () {
    return view('test-cookies');
});

// ADMIN AUTHENTICATION ROUTES - ADD THIS SECTION
// Admin Authentication Routes (not protected)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');
});

// Protected Admin Routes
Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    // Contact Submissions
    Route::resource('contact-submissions', App\Http\Controllers\Admin\ContactSubmissionController::class);
    Route::patch('contact-submissions/{contactSubmission}/mark-read', [App\Http\Controllers\Admin\ContactSubmissionController::class, 'markAsRead'])->name('contact-submissions.mark-read');
    Route::patch('contact-submissions/{contactSubmission}/mark-replied', [App\Http\Controllers\Admin\ContactSubmissionController::class, 'markAsReplied'])->name('contact-submissions.mark-replied');
});
