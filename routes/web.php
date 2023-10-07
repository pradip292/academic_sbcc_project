<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;




Route::group(['middleware' => ['guest']], function () {

    //Route For Handing Guest Opration

    Route::get('/', [AuthController::class, 'showLogin'])->name('login');;

    Route::post('do-login', [AuthController::class, 'doLogin']);
});
Route::group(['middleware' => ['auth']], function () {

    //Authentication Routes

    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('home', [AuthController::class, 'home'])->name('home');

    Route::get('add-question', [QuestionController::class,'AddQuestion'])->name('question');

    Route::post('upload-questions', [QuestionController::class,'UploadQuestion'])->name('upload-question');
    
});