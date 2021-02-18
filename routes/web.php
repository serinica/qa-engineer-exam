<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VideoLinkController;

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

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();
// Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/list',[App\Http\Controllers\ProductController::class, 'index'])->middleware('auth');
Route::get('/video', [App\Http\Controllers\VideoLinkController::class, 'index'])->middleware('auth');

Route::delete('product/{product}', 'ProductController@destroy');
Route::post('product', 'ProductController@store');
Route::put('product', 'ProductController@update');
Route::get('/create', [App\Http\Controllers\ProductController::class, 'createView'])->name('create.view');


Route::post('video','VideoLinkController@saveVideoURL');
Route::get('video/url', 'VideoLinkController@getVideoURL');
Route::get('videos/{video}','VideoLinkController@getSingleVideo');
// Route::resource('products', ProductController::class);
