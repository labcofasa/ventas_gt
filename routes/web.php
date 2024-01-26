<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/inicio', [HomeController::class, 'index'])->name('home.page');
Route::get('/', [LoginController::class, 'showForm'])->name('login.page');
Route::post('/autenticando', [LoginController::class, 'login'])->name('login');
Route::get('/saliendo', [LoginController::class, 'logout'])->name('logout');
