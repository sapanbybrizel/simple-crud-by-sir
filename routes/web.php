<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/user', [UserController::class, 'index'])->name('user_listing');
Route::get('/user/create', [UserController::class, 'create'])->name('user_create');
Route::post('/user/store', [UserController::class, 'store'])->name('user_store');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user_edit');
Route::patch('/user/update/{id}', [UserController::class, 'update'])->name('user_update');
Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user_delete');


