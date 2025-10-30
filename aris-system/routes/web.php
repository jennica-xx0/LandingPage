<?php

use Illuminate\Support\Facades\Route;
// 1. Import the controller you created
use App\Http\Controllers\PageController;

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

// 2. Point the root URL ('/') to the 'home' method in your PageController
Route::get('/', [PageController::class, 'home']);

// The old route can now be deleted:
// Route::get('/', function () {
//     return view('home');
// });