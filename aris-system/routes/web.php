<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/announcements/{announcement}', [PageController::class, 'showAnnouncement'])->name('announcements.show');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/announcements', [AdminController::class, 'announcementsIndex'])->name('announcements.index');
    Route::get('/announcements/create', [AdminController::class, 'announcementsCreate'])->name('announcements.create');
    Route::post('/announcements', [AdminController::class, 'announcementsStore'])->name('announcements.store');
    Route::get('/announcements/{announcement}/edit', [AdminController::class, 'announcementsEdit'])->name('announcements.edit');
    Route::put('/announcements/{announcement}', [AdminController::class, 'announcementsUpdate'])->name('announcements.update');
    Route::delete('/announcements/{announcement}', [AdminController::class, 'announcementsDestroy'])->name('announcements.destroy');

    Route::get('/officials', [AdminController::class, 'officialsIndex'])->name('officials.index');
    Route::get('/officials/create', [AdminController::class, 'officialsCreate'])->name('officials.create');
    Route::post('/officials', [AdminController::class, 'officialsStore'])->name('officials.store');
    Route::get('/officials/{official}/edit', [AdminController::class, 'officialsEdit'])->name('officials.edit');
    Route::put('/officials/{official}', [AdminController::class, 'officialsUpdate'])->name('officials.update');
    Route::delete('/officials/{official}', [AdminController::class, 'officialsDestroy'])->name('officials.destroy');
});