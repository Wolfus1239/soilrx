<?php

use App\Http\Controllers\Auth\Login\LoginController;
use App\Http\Controllers\Auth\Logout\LogoutController;
use App\Http\Controllers\Auth\Me\MeController;
use App\Http\Controllers\Auth\Refresh\RefreshController;
use App\Http\Controllers\FieldController\FieldController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Register\RegisterController;
use App\Http\Controllers\Auth\ResendMailVerify\ResendMailVerifyController;
use App\Http\Controllers\Auth\VerifyEmail\VerifyEmailController;
use App\Http\Controllers\Auth\ForgotPassword\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPassword\ResetPasswordController;
use App\Http\Controllers\Plots_Controllers\PlotsAddController;
use App\Http\Controllers\Plots_Controllers\PlotsEditController;
use App\Http\Controllers\Plots_Controllers\PlotsDeleteController;
use App\Http\Controllers\Plots_Controllers\PlotsGetController;
use App\Http\Controllers\Soil_type_Controllers\SoilTypeController;
use App\Http\Controllers\MlDataController\MlDataController;


Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
Route::post('reset-password', [ResetPasswordController::class, 'resetPassword']);

Route::post('auth/login', [LoginController::class, 'login'])->middleware('api')->name('login');
Route::post('auth/refresh', [RefreshController::class, 'refresh'])->name('refresh');
Route::group(['middleware' => ['jwt.auth', 'verified'], 'prefix' => 'auth'], function ($router) {
    Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
    Route::post('me', [MeController::class, 'me'])->name('me');
});
Route::post('/register', [RegisterController::class, '__invoke']);
Route::post('/resend-mail-verify', [ResendMailVerifyController::class, 'resend']);
Route::get('/email/verify/{id}', [VerifyEmailController::class, 'verify'])->name('verification.verify');

Route::post('fields', [FieldController::class, 'store'])->middleware(['verified', 'jwt.auth']);
Route::get('fields/{field}', [FieldController::class, 'show']);
Route::patch('fields/{field}', [FieldController::class, 'update'])->middleware(['verified', 'jwt.auth']);
Route::delete('fields/{field}', [FieldController::class, 'destroy'])->middleware(['verified', 'jwt.auth']);
Route::get('get-fields', [FieldController::class, 'list']);
Route::get('get-plots-number/{id}', [FieldController::class, 'getPlotsNumber']);

//Роуты для работы с участками
Route::post('plots/add', [PlotsAddController::class, 'PlotAdd']);
Route::delete('plots/delete/{id}', [PlotsDeleteController::class, 'deletePlots']);
Route::put('plots/edit/{id}', [PlotsEditController::class, 'editPlots']);
Route::get('plots/get/{id}', [PlotsGetController::class, 'getPlots']);
Route::get('plots-all', [PlotsGetController::class, 'getPlotsAll']);
//Роут для получения списка типов почвы
Route::get('soil-types', [SoilTypeController::class, 'listing_type_soil']);

//Роут для загркзки пдф файла
Route::post('upload-pdf/{id}', [PlotsAddController::class, 'uploadPdf']);

//Роут для отправки и получения данных на мл.
Route::get('ml-predict-fertile/{id}', [MlDataController::class, 'predictFertile']);
Route::get('ml-analysis/{id}', [MlDataController::class, 'analysisFertile']);
Route::get('ml-top-recommend/{id}', [MlDataController::class, 'topRecommend']);
