<?php

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Question Related API to react app
Route::group(['middleware' => ['guest']], function () {
    
Route::post('view-theory-question', [QuestionController::class,'ViewQuestionTheory'])->name('view-theory-question');

Route::post('view-practical-question', [QuestionController::class,'ViewQuestionPractical'])->name('view-practical-question');

Route::post('login-student',[ApiController::class,'StudentLogin'])->name('sign_in');

Route::get('questions',[ApiController::class,'SendQuestions'])->name('questions');


});




