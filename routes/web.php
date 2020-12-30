<?php

use Illuminate\Support\Facades\Route;

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


//FRONTEND
Route::namespace('Frontend')->group(function (){
    Route::get('/', 'ProductController@index')->name('homepage');
    Route::get('/catalog', 'ProductController@index')->name('catalog');
    Route::get('/account', function () {
        return view('frontend.user.account');
    })->middleware('auth');

//Frontend Ajax queries
    Route::get('/get_product_by_id/{id}', 'ProductAttributeController@indexAjax');
});


//BACKEND
Route::group([
    'name' => 'admin.',
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'is_admin'],
], function () {
    Route::get('/', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/products/create','ProductController@create')->middleware(['auth'])->name('product.create');
});

// AUTH
require __DIR__ . '/auth.php';


