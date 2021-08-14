<?php

use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/video/{id}', [VideoController::class, 'show']);
Route::post('/video', [VideoController::class, 'store']);
Route::get('/teachers', [TeacherController::class, 'index']);
Route::get('/teacher/{name}/videos/', [VideoController::class, 'findListByTeacher']);
Route::get('/teacher/{name}', [TeacherController::class, 'show']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/subscription', [SubscriptionController::class, 'index']);
    Route::get('/subscription/status', [SubscriptionController::class, 'status']);
    Route::post('/subscription/subscribe', [SubscriptionController::class, 'subscribe']);
    Route::post('/subscription/cancel', [SubscriptionController::class, 'cancel']);
    Route::post('/subscription/resume', [SubscriptionController::class, 'resume']);
    Route::post('/subscription/change_plan', [SubscriptionController::class, 'change_plan']);
    Route::post('/subscription/update_card', [SubscriptionController::class, 'update_card']);
});

Route::group(['middleware' => ['auth:teacher']], function () {
    Route::get('/teacher', function (Request $request) {
        return $request->user('teacher');
    });

    Route::get('/teacher/videos/{name}', [VideoController::class, 'findListByTeacher']);
});
