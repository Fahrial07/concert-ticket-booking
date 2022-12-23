<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ConcerController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\CheckInController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Landing\Book\BookingController;
use App\Http\Controllers\Landing\Book\SearchTicketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::resource('/', LandingController::class);
Route::resource('booking', BookingController::class);
Route::get('my_ticket/{id}', [BookingController::class, 'ticket'])->name('my.ticket');
Route::get('print_my_ticket/{id}', [BookingController::class, 'cetak_ticket'])->name('print.ticket');
Route::resource('search_my_ticket', SearchTicketController::class);

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::middleware(['auth:sanctum', 'verified'])->group(function () {

        Route::resource('dashboard', DashboardController::class);
        Route::resource('ticket_order', OrderController::class);
        Route::resource('check_in', CheckInController::class);
        Route::resource('report', ReportController::class);
        Route::resource('concer', ConcerController::class);

    }
    );

});
require __DIR__.'/auth.php';
