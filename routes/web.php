<?php

// بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْمِ

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\JsonController;


/////////////////////////////////////////////
Auth::routes();

Route::get('/home', [ HomeController::class, 'index' ]);
Route::get('/', [ HomeController::class, 'index' ])->name('home');

Route::view('/login', 'login')->name('login');

Route::group(['middleware'=> "admin"], function(){

    // Categories
    Route::get('/categories', [ CategoryController::class, 'index' ])->name('categories');
    Route::post('/categories', [ CategoryController::class, 'store' ]);
    Route::get('/categories/edit/{id}', [ CategoryController::class, 'edit_view' ]);
    Route::post('/categories/edit/{id}', [ CategoryController::class, 'edit' ]);
    Route::get('/categories/delete/{id}', [ CategoryController::class, 'delete_view' ]);
    Route::post('/categories/delete/{id}', [ CategoryController::class, 'delete' ]);

    
    // Brands
    Route::get('/brands', [ BrandController::class, 'index' ])->name('brands');
    Route::post('/brands', [ BrandController::class, 'store' ]);
    Route::get('/brands/edit/{id}', [ BrandController::class, 'edit_view' ]);
    Route::post('/brands/edit/{id}', [ BrandController::class, 'edit' ]);
    Route::get('/brands/delete/{id}', [ BrandController::class, 'delete_view' ]);
    Route::post('/brands/delete/{id}', [ BrandController::class, 'delete' ]);

    
    // Products
    Route::get('/products', [ ProductController::class, 'index' ])->name('products');
    Route::post('/products', [ ProductController::class, 'store' ]);
    Route::get('/products/edit/{id}', [ ProductController::class, 'edit_view' ]);
    Route::post('/products/edit/{id}', [ ProductController::class, 'edit' ]);
    Route::get('/products/delete/{id}', [ ProductController::class, 'delete_view' ]);
    Route::post('/products/delete/{id}', [ ProductController::class, 'delete' ]);

    //JSON
    Route::view('/json', 'json.all')->name("json");
    Route::get('/json/load-ajax', [ JsonController::class, 'load_ajax' ])->name('load-ajax');
    
});