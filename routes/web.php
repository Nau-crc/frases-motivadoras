<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhraseController;


Route::get('/home', [PhraseController::class, 'index'])->name('home');
Route::get('/create', [PhraseController::class, 'create'])->name('create');
Route::post('/store', [PhraseController::class, 'store'])->name('store');
Route::get('/show/{id}', [PhraseController::class, 'show'])->name('show');
Route::get('/edit/{id}', [PhraseController::class, 'edit'])->name('edit');
Route::patch('/update/{id}', [PhraseController::class, 'update'])->name('update');
Route::delete('/destroy/{id}', [PhraseController::class, 'destroy'])->name('destroy');