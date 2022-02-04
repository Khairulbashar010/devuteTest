<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\HomeController;

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
Auth::routes();

Route::get('', [MainController::class, 'login_form'])->name('signin');
Route::get('signup', [MainController::class, 'registration_form'])->name('signup');
Route::get('verify-email/{code}', [MainController::class, 'verifyEmail'])->name('verifyEmail');
Route::post('resend/verification', [MainController::class, 'verificationEmail'])->name('resendVerificationEmail');

Route::group(['prefix'=>'forgot-password', 'middleware'=>['guest'], 'namespace'=>'App\Http\Controllers'], function (){
    Route::get('', 'MainController@forgotPassword')->name('forgotPassword');
    Route::post('provide-email', 'MainController@checkEmail')->name('checkEmail');
    Route::get('security-questions/{id}', 'MainController@submitAnswer')->name('submitAnswer');
    Route::post('check-answer', 'MainController@checkAnswer')->name('checkAnswer');
    Route::get('update-password/{id}', 'MainController@viewChangePassword')->name('viewChangePassword');
    Route::post('update-password', 'MainController@updatePassword')->name('updatePassword');
});


Route::group(['as' => 'admin.', 'prefix'=>'admin', 'middleware'=>['admin','auth'], 'namespace'=>'App\Http\Controllers\Admin'], function (){
    Route::get('dashboard', 'AdminController@index')->name('dashboard');
    Route::get('answers', 'AdminController@answers')->name('answers');
});

Route::group(['as' => 'user.', 'prefix'=>'user', 'middleware'=>['user','auth'], 'namespace'=>'App\Http\Controllers\User'], function (){
    Route::get('dashboard', 'UserController@index')->name('dashboard');
});

Route::group(['as' => 'common.', 'prefix'=>'common', 'middleware'=>['role_check:1,2'], 'namespace'=>'App\Http\Controllers\Common'], function (){
    Route::get('profile','ProfileController@index')->name('profile');
    Route::post('update-profile','ProfileController@updateProfile')->name('updateProfile');
});
