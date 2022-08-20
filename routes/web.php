<?php

use App\Http\Controllers\Admin\PemilihController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Main\DashboardController;
use App\Http\Controllers\User\DashboardVotingController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::redirect('/', '/dashboard-voting');

// Admin
Route::middleware(['auth', 'admin'])->group(function() {
    // Main Dashboard
    Route::get('/dashboard-admin', [DashboardController::class, 'index'])->name('dashboard');

    // Resource Pemilih
    Route::resource('pemilihs', PemilihController::class)->names('pemilih')->scoped(['pemilih' => 'nim']);
    Route::patch('pemilihs/reset/votes', [PemilihController::class, 'reset'])->name('pemilih.reset');
    Route::post('pemilihs/import', [PemilihController::class, 'import'])->name('pemilih.import');
});

// Auth
Route::middleware(['guest'])->group(function() {
    Route::get('/login', [LoginController::class, 'create'])->name('login.create');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->withoutMiddleware('guest')->middleware('auth');

    Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

// Dashboard Voting
Route::get('dashboard-voting', [DashboardVotingController::class, 'index'])->name('dashboard.voting')->middleware('auth');
Route::post('dashboard-voting/vote/{calon:nim}', [DashboardVotingController::class, 'voting'])->name('dashboard.voting.vote');
