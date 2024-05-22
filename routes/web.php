<?php

use App\Http\Controllers\BankSoalController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TopikController;
use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

Route::resource('/topik', TopikController::class);
Route::resource('/soal', BankSoalController::class);
Route::resource('/paket', PaketController::class);

