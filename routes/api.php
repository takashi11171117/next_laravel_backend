<?php

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
Route::get('/teachers', [TeacherController::class, 'index']);
Route::get('/teacher/{name}/videos/', [VideoController::class, 'findListByTeacher']);
Route::get('/teacher/{name}', [TeacherController::class, 'show']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::group(['middleware' => ['auth:teacher']], function () {
    Route::get('/teacher', function (Request $request) {
        return $request->user('teacher');
    });

    Route::get('/teacher/videos/{name}', [VideoController::class, 'findListByTeacher']);
});
