<?php

use App\Http\Controllers\UserController;
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

Route::get('/get_lazy_image', [UserController::class,'getlazyImage'] );

Route::get('/get_eagar_image', [UserController::class,'getEagarImage'] );

Route::get('/get_users', [UserController::class,'index'] );

Route::get('/set_image/{id}', [UserController::class,'storeImage'] );

Route::get('/create_users', [UserController::class,'create'] );

Route::get('/delete_user/{id}', [UserController::class,'destroy'] );







