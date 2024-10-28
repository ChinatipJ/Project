<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LoginController;
use App\Models\Category;
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
            Route::get('/register', 'showRegister')->name('register'); // แสดงฟอร์ม register
            Route::post('/register', 'register')->name('register_submit'); // ประมวลผลการลงทะเบียน
    
        });

    Route::middleware(['auth'])->group(function () {
        Route::controller(HomeController::class)
            ->prefix('home')
            ->name('home.')
            ->group(function () {
                Route::get('form', 'show')->name('form');
            });

        Route::controller(CategoryController::class)
            ->prefix('categories')
            ->name('categories.')
            ->group(function () {
                // Route สำหรับแสดงรายการอาหารใน categories/list
                Route::get('{category}/list', 'list')->name('list');
            });



        //ที่ล็อตเต้เพิ่มมา 
        Route::get('/search', [LayoutController::class, 'handleSearch'])
            ->name('foods.search');

        Route::controller(FoodController::class)
            ->prefix('foods')
            ->name('foods.')
            ->group(function () {
                Route::get('list', 'list')->name('list');
                Route::get('control', 'control')->name('control');
                Route::get('FormCreate', 'ShowFormCreate')->name('create');
                Route::post('Add', 'CreateAdd')->name('createAdd');
                Route::post('update/{food}', 'updateNew')->name('updateNew'); 
                Route::get('view/{food}', 'show')->name('view');
                Route::get('update/{food}','update')->name('update-form');
                Route::get('delete/{food}','delete')->name('delete-form');
            });
    });
});
