<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home/form', [HomeController::class, 'show'])->name('home.form');

Route::get('/foods/view', [FoodController::class, 'show'])->name('foods.view');
Route::get('/foods/list', [FoodController::class, 'list'])->name('foods.list');
