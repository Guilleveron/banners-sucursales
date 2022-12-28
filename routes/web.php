<?php

use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Http\Exceptions\NotFound;
use \App\Http\Controllers\BannersController;
use \App\Http\Controllers\UsersController;
use \App\Http\Controllers\ShowBannersController;
use \App\Http\Controllers\CategoriesController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/inicio', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::group(['middleware' => 'auth'], function () {
    Route::resource('banners', BannersController::class);
    Route::resource('users', UsersController::class);
    Route::resource('categories', CategoriesController::class);
});

Route::get('showbanners/{category?}', [ShowBannersController::class, 'index']);





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

//require __DIR__.'/auth.php';
