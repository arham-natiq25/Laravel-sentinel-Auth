<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\EmailActivationController;
use App\Http\Controllers\Auth\ForgetPasswordPageController;
use App\Http\Controllers\Auth\LoginPageController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\PasswordUpdateController;
use App\Http\Controllers\Auth\RegisterPageController;
use App\Http\Controllers\Auth\ResendUserRegisterMailController;
use App\Http\Controllers\Auth\ResetPasswordPageController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\AuthEmailVerifyPageController;
use App\Http\Controllers\AuthResetPasswordController;
use App\Http\Controllers\UserDashboardController;
use App\Mail\UserActivationMail;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Mail;
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


// creation of roles
// Route::get('/role',function () {
//     $role = Sentinel::getRoleRepository()->createModel()->create([
//         'name' => 'Subscriber',
//         'slug' => 'subscriber',
//     ]);
// });
Route::get('/admin/role', function () {
    // Assuming you have a user model instance
    $user = Sentinel::getUserRepository()->findById(3);
    // Get the role by its slug
    $adminRole = Sentinel::findRoleBySlug('admin');

    $adminRole->users()->attach($user);
});
Route::group(['as' => 'auth.', 'middleware' => 'guest'], function () {
    Route::get('/login', LoginPageController::class)->name('login');
    Route::post('/user-login', UserLoginController::class)->name('user.login');
    Route::get('/register', RegisterPageController::class)->name('register');
    Route::post('/user-register', UserRegisterController::class)->name('user.register');
    Route::get('/email/active/{token}', EmailActivationController::class)->name('email.active');
    Route::get('/email/verify', AuthEmailVerifyPageController::class)->name('email.verify');
    Route::get('/reset-password', ResetPasswordPageController::class)->name('reset-password');
    Route::post('/reset-password', AuthResetPasswordController::class)->name('reset-user-password');
    Route::get('/forget-password/{token}', ForgetPasswordPageController::class)->name('forget-password');
    Route::post('/update-password/{token}', PasswordUpdateController::class)->name('password.update');
    Route::get('/resend/email', ResendUserRegisterMailController::class)->name('resend-email');
});

Route::group(['as'=>'admin.','middleware'=>'admin'],function(){
    Route::get('/admin/dashboard',DashboardController::class)->name('dashboard');
});

Route::get('/active', function () {
    $user = Sentinel::findById(3);
    $activation = Activation::completed($user);
});

Route::get('/logout',function(){
    Sentinel::logout();
});

Route::middleware(['auth.user'])->group(function () {
    Route::get('/dashboard', UserDashboardController::class)->name('dashboard');
    Route::get('/logout', LogoutController::class)->name('logout');
});
