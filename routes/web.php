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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function (){
    Route::get('/', function(){
        return 'Halaman Admin';
    });
    Route::get('profile', function(){
        return 'Halaman Profile Admin';
    });
});

Route::group(['prefix' => 'member', 'middleware' => ['auth', 'role:member']], function (){
    Route::get('/', function(){
        return 'Halaman Member';
    });
    Route::get('profile', function(){
        return 'Halaman Profile Member';
    });
});    
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
