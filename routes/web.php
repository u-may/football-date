<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchGameController;
use App\Http\Controllers\LaporanController;
use App\Http\Middleware\AdminMiddleware;

// Route publik
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/jadwal', [HomeController::class, 'jadwal'])->name('jadwal');
Route::get('/pertandingan/{id}', [HomeController::class, 'detail'])->name('detail');

// Route dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route admin
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::resource('leagues', LeagueController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('matchgames', MatchGameController::class);
});

require __DIR__.'/auth.php';