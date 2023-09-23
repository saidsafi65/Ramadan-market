<?php

use App\Http\Controllers\DailyCardController;
use App\Http\Controllers\DailyHomeNetController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationControllerController;
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

// Route::get('/', function () {
//     return view('login.login');
// });

// Route::get('/login', function () {
//     return view('login.login');
// });

// Login application :
Route::get('/', [AuthenticationControllerController::class, 'index'])->name('logins');
Route::get('/login', [AuthenticationControllerController::class, 'index'])->name('login');
Route::post('/login', [AuthenticationControllerController::class, 'dologin'])->name('login.post');
Route::get('/home', [AuthenticationControllerController::class, 'home'])->name('home');

// Registrated application :
Route::get('/registrat', [AuthenticationControllerController::class, 'registration'])->name('registrat');
Route::post('/registrated', [AuthenticationControllerController::class, 'doregistration'])->name('registrat.post');

Route::get('/daily', [AuthenticationControllerController::class, 'dailys'])->name('dailys');

// DailyCard
Route::post('/daily/cardstore', [DailyCardController::class, 'store'])->name('cardstore');
// DailyHomeNet
Route::post('/daily/homenet', [DailyHomeNetController::class, 'store'])->name('homenet.store');


// Clear application cache:
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
	Artisan::call('route:cache');
 	Artisan::call('config:cache');
    Artisan::call('view:clear');
    return 'Application cache , Routes , Config , View has been cleared';
});
