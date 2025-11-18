<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/announcements/{announcement}', [PageController::class, 'showAnnouncement'])->name('announcements.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // // Users
    // Route::get('/users', [AdminController::class, 'usersIndex'])->name('users.index');
    // Route::get('/users/create', [AdminController::class, 'usersCreate'])->name('users.create');
    // Route::post('/users', [AdminController::class, 'usersStore'])->name('users.store');
    // Route::get('/users/{user}', [AdminController::class, 'usersShow'])->name('users.show');

    Route::get('/announcements', [AdminController::class, 'announcementsIndex'])->name('announcements.index');
    Route::post('/announcements', [AdminController::class, 'announcementsStore'])->name('announcements.store');
    Route::put('/announcements/{announcement}', [AdminController::class, 'announcementsUpdate'])->name('announcements.update');
    Route::delete('/announcements/{announcement}', [AdminController::class, 'announcementsDestroy'])->name('announcements.destroy');

    Route::get('/officials', [AdminController::class, 'officialsIndex'])->name('officials.index');
    Route::post('/officials', [AdminController::class, 'officialsStore'])->name('officials.store');
    Route::put('/officials/{official}', [AdminController::class, 'officialsUpdate'])->name('officials.update');
    Route::delete('/officials/{official}', [AdminController::class, 'officialsDestroy'])->name('officials.destroy');
});