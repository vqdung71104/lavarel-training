<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class,'index'])->name('users.index');
Route::get('/users/create', [UserController::class,'create'])->name('users.create');
Route::get('/users/edit', [UserController::class,'edit'])->name('users.edit');
Route::post('/users/store', [UserController::class,'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class,'show'])->name('users.show');
Route::put('/users/{user}', [UserController::class,'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class,'destroy'])->name('users.destroy');   

Route::resource('/tasks',TaskController::class);


