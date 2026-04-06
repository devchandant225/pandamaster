<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GamingDashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GameAdminController;
use App\Http\Controllers\Admin\GameCategoryAdminController;
use App\Http\Controllers\Admin\MetaTagController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Game Routes (Public browsing)
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/{slug}', [GameController::class, 'show'])->name('games.show');
Route::get('/games/{slug}/demo', [GameController::class, 'demo'])->name('games.demo');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Password Reset Routes
    Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('auth');

// Authenticated Gaming Dashboard Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [GamingDashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/profile', [GamingDashboardController::class, 'profile'])->name('dashboard.profile');
    Route::put('/dashboard/profile', [GamingDashboardController::class, 'updateProfile'])->name('dashboard.profile.update');
    Route::get('/games/{slug}/play', [GameController::class, 'play'])->name('games.play');
});

// Admin Specific Routes (Only admin role)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/search', [AdminDashboardController::class, 'search'])->name('search');

    // User Management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Game Management
    Route::get('/games', [GameAdminController::class, 'index'])->name('games.index');
    Route::get('/games/create', [GameAdminController::class, 'create'])->name('games.create');
    Route::post('/games', [GameAdminController::class, 'store'])->name('games.store');
    Route::get('/games/{game}', [GameAdminController::class, 'show'])->name('games.show');
    Route::get('/games/{game}/edit', [GameAdminController::class, 'edit'])->name('games.edit');
    Route::put('/games/{game}', [GameAdminController::class, 'update'])->name('games.update');
    Route::delete('/games/{game}', [GameAdminController::class, 'destroy'])->name('games.destroy');
    Route::post('/games/{game}/toggle-status', [GameAdminController::class, 'toggleStatus'])->name('games.toggle-status');

    // Game Category Management
    Route::get('/game-categories', [GameCategoryAdminController::class, 'index'])->name('game-categories.index');
    Route::get('/game-categories/create', [GameCategoryAdminController::class, 'create'])->name('game-categories.create');
    Route::post('/game-categories', [GameCategoryAdminController::class, 'store'])->name('game-categories.store');
    Route::get('/game-categories/{gameCategory}/edit', [GameCategoryAdminController::class, 'edit'])->name('game-categories.edit');
    Route::put('/game-categories/{gameCategory}', [GameCategoryAdminController::class, 'update'])->name('game-categories.update');
    Route::delete('/game-categories/{gameCategory}', [GameCategoryAdminController::class, 'destroy'])->name('game-categories.destroy');

    // Meta Tags Management
    Route::get('/meta-tags', [MetaTagController::class, 'index'])->name('meta-tags.index');
    Route::get('/meta-tags/create', [MetaTagController::class, 'create'])->name('meta-tags.create');
    Route::post('/meta-tags', [MetaTagController::class, 'store'])->name('meta-tags.store');
    Route::get('/meta-tags/{metaTag}', [MetaTagController::class, 'show'])->name('meta-tags.show');
    Route::get('/meta-tags/{metaTag}/edit', [MetaTagController::class, 'edit'])->name('meta-tags.edit');
    Route::put('/meta-tags/{metaTag}', [MetaTagController::class, 'update'])->name('meta-tags.update');
    Route::delete('/meta-tags/{metaTag}', [MetaTagController::class, 'destroy'])->name('meta-tags.destroy');
    Route::post('/meta-tags/{metaTag}/toggle-status', [MetaTagController::class, 'toggleStatus'])->name('meta-tags.toggle-status');

    // Blog Management
    Route::get('/blog', [\App\Http\Controllers\Admin\AdminPostController::class, 'index'])->name('blog.index');
    Route::get('/blog/create', [\App\Http\Controllers\Admin\AdminPostController::class, 'create'])->name('blog.create');
    Route::post('/blog', [\App\Http\Controllers\Admin\AdminPostController::class, 'store'])->name('blog.store');
    Route::get('/blog/{post}/edit', [\App\Http\Controllers\Admin\AdminPostController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{post}', [\App\Http\Controllers\Admin\AdminPostController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{post}', [\App\Http\Controllers\Admin\AdminPostController::class, 'destroy'])->name('blog.destroy');

    // Blog Category Management
    Route::get('/categories', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'destroy'])->name('categories.destroy');

    // Profile Management
    Route::get('/profile', [\App\Http\Controllers\Admin\AdminProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [\App\Http\Controllers\Admin\AdminProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [\App\Http\Controllers\Admin\AdminProfileController::class, 'updatePassword'])->name('profile.password');
});
