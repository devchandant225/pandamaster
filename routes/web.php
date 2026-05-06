<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GameAdminController;
use App\Http\Controllers\Admin\MetaTagController;
use App\Http\Controllers\Admin\LandingSectionController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrionStarController;

Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [\App\Http\Controllers\RobotsController::class, 'index'])->name('robots');
Route::get('/generate-sitemap', [\App\Http\Controllers\SitemapController::class, 'index']); // Alias as requested

// Public Routes
Route::get('/', [OrionStarController::class, 'index'])->name('home');
Route::get('/777', [OrionStarController::class, 'sevenSeven'])->name('orionstar.777');
Route::get('/download', [OrionStarController::class, 'download'])->name('orionstar.download');
Route::get('/play-online', [OrionStarController::class, 'playOnline'])->name('orionstar.play-online');
Route::get('/orion-stars-fish-games', [OrionStarController::class, 'fishGames'])->name('orionstar.fish-games');
Route::get('/orion-stars-slot-games', [OrionStarController::class, 'slotGames'])->name('orionstar.slot-games');
Route::get('/orion-stars-sweepstakes-table-games', [OrionStarController::class, 'tableGames'])->name('orionstar.table-games');
Route::get('/orion-stars-keno', [OrionStarController::class, 'keno'])->name('orionstar.keno');
Route::get('/privacy-policy', [OrionStarController::class, 'privacy'])->name('privacy');
Route::get('/terms-conditions', [OrionStarController::class, 'terms'])->name('terms');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/investors', [\App\Http\Controllers\InvestorController::class, 'index'])->name('investors');
Route::get('/tools', [\App\Http\Controllers\ToolsController::class, 'index'])->name('tools');
Route::get('/contact', [OrionStarController::class, 'contact'])->name('contact');
Route::post('/contact', [OrionStarController::class, 'contactStore'])->name('contact.store');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Game Routes
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/{slug}', [GameController::class, 'show'])->name('games.show');
Route::get('/games/{slug}/play', [GameController::class, 'play'])->name('games.play');
Route::get('/games/{slug}/demo', [GameController::class, 'demo'])->name('games.demo');

// Auth Routes
Route::get('/login', [OrionStarController::class, 'login'])->name('login');

Route::middleware('guest')->group(function () {
    Route::get('admin-login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
    Route::post('admin-login', [AuthenticatedSessionController::class, 'store']);

    // Password Reset Routes
    Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('auth');

// Admin Dashboard Routes (Only admin role)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/search', [AdminDashboardController::class, 'search'])->name('admin.search');

    // Admin Profile
    Route::get('/admin/profile', [\App\Http\Controllers\Admin\AdminProfileController::class, 'index'])->name('admin.profile');
    Route::put('/admin/profile', [\App\Http\Controllers\Admin\AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::put('/admin/profile/password', [\App\Http\Controllers\Admin\AdminProfileController::class, 'updatePassword'])->name('admin.profile.password');
    Route::delete('/admin/profile/remove-logo', [\App\Http\Controllers\Admin\AdminProfileController::class, 'removeLogo'])->name('admin.profile.remove-logo');
    Route::delete('/admin/profile/remove-favicon', [\App\Http\Controllers\Admin\AdminProfileController::class, 'removeFavicon'])->name('admin.profile.remove-favicon');

    // User Management
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // Game Management
    Route::get('/admin/games', [GameAdminController::class, 'index'])->name('admin.games.index');
    Route::get('/admin/games/create', [GameAdminController::class, 'create'])->name('admin.games.create');
    Route::post('/admin/games', [GameAdminController::class, 'store'])->name('admin.games.store');
    Route::get('/admin/games/{game}', [GameAdminController::class, 'show'])->name('admin.games.show');
    Route::get('/admin/games/{game}/edit', [GameAdminController::class, 'edit'])->name('admin.games.edit');
    Route::put('/admin/games/{game}', [GameAdminController::class, 'update'])->name('admin.games.update');
    Route::delete('/admin/games/{game}', [GameAdminController::class, 'destroy'])->name('admin.games.destroy');
    Route::post('/admin/games/{game}/toggle-status', [GameAdminController::class, 'toggleStatus'])->name('admin.games.toggle-status');

    // Media Management
    Route::get('/admin/media', [\App\Http\Controllers\Admin\MediaController::class, 'index'])->name('admin.media.index');
    Route::post('/admin/media', [\App\Http\Controllers\Admin\MediaController::class, 'store'])->name('admin.media.store');
    Route::delete('/admin/media/{media}', [\App\Http\Controllers\Admin\MediaController::class, 'destroy'])->name('admin.media.destroy');

    // Meta Tags Management
    Route::get('/admin/meta-tags', [MetaTagController::class, 'index'])->name('admin.meta-tags.index');
    Route::get('/admin/meta-tags/create', [MetaTagController::class, 'create'])->name('admin.meta-tags.create');
    Route::post('/admin/meta-tags', [MetaTagController::class, 'store'])->name('admin.meta-tags.store');
    Route::get('/admin/meta-tags/{metaTag}', [MetaTagController::class, 'show'])->name('admin.meta-tags.show');
    Route::get('/admin/meta-tags/{metaTag}/edit', [MetaTagController::class, 'edit'])->name('admin.meta-tags.edit');
    Route::put('/admin/meta-tags/{metaTag}', [MetaTagController::class, 'update'])->name('admin.meta-tags.update');
    Route::delete('/admin/meta-tags/{metaTag}', [MetaTagController::class, 'destroy'])->name('admin.meta-tags.destroy');
    Route::post('/admin/meta-tags/{metaTag}/toggle-status', [MetaTagController::class, 'toggleStatus'])->name('admin.meta-tags.toggle-status');

    // Landing Page Management
    Route::get('/admin/landing-sections', [LandingSectionController::class, 'index'])->name('admin.landing-sections.index');
    Route::get('/admin/landing-sections/create', [LandingSectionController::class, 'create'])->name('admin.landing-sections.create');
    Route::post('/admin/landing-sections', [LandingSectionController::class, 'store'])->name('admin.landing-sections.store');
    Route::get('/admin/landing-sections/{landingSection}/edit', [LandingSectionController::class, 'edit'])->name('admin.landing-sections.edit');
    Route::put('/admin/landing-sections/{landingSection}', [LandingSectionController::class, 'update'])->name('admin.landing-sections.update');
    Route::delete('/admin/landing-sections/{landingSection}', [LandingSectionController::class, 'destroy'])->name('admin.landing-sections.destroy');
    Route::post('/admin/landing-sections/{landingSection}/toggle-status', [LandingSectionController::class, 'toggleStatus'])->name('admin.landing-sections.toggle-status');

    // Blog Management
    Route::get('/admin/blog', [\App\Http\Controllers\Admin\AdminPostController::class, 'index'])->name('admin.blog.index');
    Route::get('/admin/blog/create', [\App\Http\Controllers\Admin\AdminPostController::class, 'create'])->name('admin.blog.create');
    Route::post('/admin/blog', [\App\Http\Controllers\Admin\AdminPostController::class, 'store'])->name('admin.blog.store');
    Route::get('/admin/blog/{post}/edit', [\App\Http\Controllers\Admin\AdminPostController::class, 'edit'])->name('admin.blog.edit');
    Route::put('/admin/blog/{post}', [\App\Http\Controllers\Admin\AdminPostController::class, 'update'])->name('admin.blog.update');
    Route::delete('/admin/blog/{post}', [\App\Http\Controllers\Admin\AdminPostController::class, 'destroy'])->name('admin.blog.destroy');
});
