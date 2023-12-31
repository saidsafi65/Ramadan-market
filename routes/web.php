<?php

use App\Http\Controllers\AddBalanceController;
use App\Http\Controllers\DailyCardController;
use App\Http\Controllers\DailyCardPOSController;
use App\Http\Controllers\DailyHomeNetController;
use App\Http\Controllers\InternetSubscriptionController;
use App\Http\Controllers\JawwalOoredooElectrsityController;
use App\Http\Controllers\MobileExExpenseController;
use App\Http\Controllers\SnakController;
use App\Http\Controllers\SnakExExpenseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationControllerController;
use App\Http\Controllers\PersonalExpenseController;
use App\Http\Controllers\WorkerExpenseController;
use App\Models\DailyCard_P_O_S;
use Illuminate\Support\Facades\Artisan;

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
Route::get('/login', [AuthenticationControllerController::class, 'forcelogin'])->name('login');
Route::post('/dologin', [AuthenticationControllerController::class, 'dologin'])->name('login.post');
Route::get('/home', [AuthenticationControllerController::class, 'home'])->name('home');

// Registrated application :
Route::get('/registrat', [AuthenticationControllerController::class, 'registration'])->name('registrat');
Route::post('/registrated', [AuthenticationControllerController::class, 'doregistration'])->name('registrat.post');

Route::get('/daily', [AuthenticationControllerController::class, 'dailys'])->name('dailys');
Route::get('/expense', [AuthenticationControllerController::class, 'expenses'])->name('expenses');

// DailyCard
Route::post('/daily/cardstore', [DailyCardController::class, 'store'])->name('cardstore');
// DailyHomeNet
Route::resource('/daily/homenet', DailyHomeNetController::class);
// DailyCard_P_O_S
Route::resource('/daily/cardPOS', DailyCardPOSController::class);
// DailySnak
Route::resource('/daily/Snak', SnakController::class);
// ADD Balance
Route::resource('/Balance', AddBalanceController::class);
// ADD Sell Jawwal Ooredoo Electrsity Balance
Route::post('/daily/JawwalOoredooElectrsity/jawwal', [JawwalOoredooElectrsityController::class, 'jawwal'])->name('jawwal');
Route::post('/daily/JawwalOoredooElectrsity/ooredoo', [JawwalOoredooElectrsityController::class, 'ooredoo'])->name('ooredoo');
Route::post('/daily/JawwalOoredooElectrsity/electrsity', [JawwalOoredooElectrsityController::class, 'electrsity'])->name('electrsity');

// ADD personal expense  Balance
Route::post('/expense/personal', [PersonalExpenseController::class, 'store'])->name('expense.personal');
// ADD worker expense
Route::post('/expense/worker', [WorkerExpenseController::class, 'store'])->name('expense.worker');
// ADD internet subscription expense
Route::post('/expense/internet', [InternetSubscriptionController::class, 'store'])->name('expense.internet');
// ADD mobileEx expense
Route::post('/expense/mobileEx', [MobileExExpenseController::class, 'store'])->name('expense.mobileEx');
// ADD snakEx expense
Route::post('/expense/snakEx', [SnakExExpenseController::class, 'store'])->name('expense.snakEx');



// Clear application cache:
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return 'Application cache , Routes , Config , View has been cleared';
});
