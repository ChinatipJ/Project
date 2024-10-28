<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReviewController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(FoodController::class)
    ->prefix('foods')
    ->name('foods.')
    ->group(function () {
        Route::get('list', 'list')->name('list');
        Route::get('view/{food}', 'show')->name('view');
    });

Route::get('/search', [LayoutController::class, 'handleSearch'])
    ->name('foods.search');

Route::controller(CategoryController::class)
    ->prefix('categories')
    ->name('categories.')
    ->group(function () {
        // Route สำหรับแสดงรายการอาหารใน categories/list
        Route::get('{category}/list', 'list')->name('list');
    });
    Route::controller(HomeController::class)
            ->prefix('home')
            ->name('home.')
            ->group(function () {
                Route::get('form', 'show')->name('form');
            });

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
        


        Route::controller(CategoryController::class)
        ->prefix('categories')
        ->name('categories.')
        ->group(function () {
           
            Route::get('control', 'control')->name('control');
            Route::get('create', 'create')->name('create');
            Route::post('createNew', 'createNew')->name('createNew');
            Route::post('update/{category}', 'updateNew')->name('updateNew');
            Route::get('update/{category}', 'update')->name('update-form');
            Route::get('delete/{category}', 'delete')->name('delete-form');


        });



        Route::controller(FoodController::class)
            ->prefix('foods')
            ->name('foods.')
            ->group(function () {

                Route::get('control', 'control')->name('control');
                Route::get('FormCreate', 'ShowFormCreate')->name('create');
                Route::post('Add', 'CreateAdd')->name('createAdd');
                Route::post('update/{food}', 'updateNew')->name('updateNew');
                Route::get('update/{food}', 'update')->name('update-form');
                Route::get('delete/{food}', 'delete')->name('delete-form');
            });

        Route::controller(ReviewController::class)
            ->prefix('reviews')
            ->name('reviews.')
            ->group(function () {
                Route::get('create/{food_id}', 'create')->name('create'); // แสดงฟอร์มสร้างรีวิว
                Route::post('/', 'store')->name('store'); // จัดการการส่งฟอร์มรีวิว
                Route::get('edit/{id}', 'edit')->name('edit'); // แสดงฟอร์มแก้ไขรีวิว
                Route::put('{id}', 'update')->name('update'); // จัดการการอัปเดตรีวิว
                Route::delete('{id}', 'destroy')->name('destroy'); // ลบรีวิว
            });
    });
});
