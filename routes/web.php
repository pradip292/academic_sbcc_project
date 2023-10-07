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

   // Question Handing Route

    Route::get('add-question', [QuestionController::class,'AddQuestion'])->name('question');

    Route::post('upload-questions-theory', [QuestionController::class,'UploadQuestionStudentTheory'])->name('upload-question-theory');

    Route::post('upload-questions-practical', [QuestionController::class,'UploadQuestionStudentPractical'])->name('upload-question-practical');

    Route::get('view-theory-question', [QuestionController::class,'ViewQuestionTheory'])->name('view-theory-question');

    Route::get('view-practical-question', [QuestionController::class,'ViewQuestionPractical'])->name('view-practical-question');

});