<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



// Route::get('/foods/view', [FoodController::class, 'show'])->name('foods.view');
// Route::get('/foods/list', [FoodController::class, 'list'])->name('foods.list');

// Route::get('/logins/form', [LoginController::class, 'show'])->name('logins.form');

Route::middleware([
    'cache.headers:no_store;no_cache;must_revalidate;max_age=0',
])->group(function () {
    Route::controller(LoginController::class)
        ->prefix('auth')
        ->group(function () {
            // name this route to login by default setting.
            Route::get('/login', 'show')->name('login');
            Route::post('/login', 'authenticate')->name('authenticate');
            Route::get('/logout', 'logout')->name('logout');
        });

        Route::middleware(['auth'])->group(function () {
            Route::controller(HomeController::class)
            ->prefix('home')
            ->name('home.')
            ->group(function(){
                Route::get('form', 'show')->name('form');

            });

            Route::controller(FoodController::class)
            ->prefix('foods')
            ->name('foods.')
            ->group(function(){
                Route::get('view', 'show')->name('view');
                Route::get('list', 'list')->name('list');
                Route::get('FormCreate', 'ShowFormCreate')->name('create');
                Route::post('Add', 'CreateAdd')->name('createAdd');

            });


});
});