<?php

use App\Http\Controllers\Auth\LoginPageController;
use App\Http\Controllers\Auth\RegisterPageController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\UserDashboardController;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
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
Route::group(['as'=>'auth.'],function(){
    Route::get('/login',LoginPageController::class)->name('login');
    Route::post('/user-login',UserLoginController::class)->name('user.login');
    Route::get('/register',RegisterPageController::class)->name('register');
    Route::post('/user-register',UserRegisterController::class)->name('user.register');
});

Route::get('/active', function () {
    $user = Sentinel::findById(3);
    $activation = Activation::completed($user);
});

Route::get('/logout',function(){
    Sentinel::logout();
});

Route::get('/dashboard',UserDashboardController::class)->name('dashboard');
