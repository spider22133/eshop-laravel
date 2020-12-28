<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
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

Route::get('/', [ProductController::class, 'index'])->name('homepage');

Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth','is_admin'])->name('dashboard');

Route::resource('products',ProductController::class);

Route::get('/account',function () {
    return view('frontend.user.account');
})->middleware('auth');

require __DIR__.'/auth.php';
