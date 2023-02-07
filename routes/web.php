<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhraseController;


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

Route::get('/home', [PhraseController::class, 'index'])->name('home');
Route::get('/create', [PhraseController::class, 'create'])->name('create');
Route::post('/store', [PhraseController::class, 'store'])->name('store');
Route::get('/show/{id}', [PhraseController::class, 'show'])->name('show');
