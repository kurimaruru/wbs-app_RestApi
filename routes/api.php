<?php

use App\Http\Controllers\WbsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// wbs操作に関するルーティング
Route::apiResource('/wbs', WbsController::class);
Route::get('/wbsDetail', [WbsController::class, 'show']);
Route::apiResource('/comment', CommentController::class);
Route::apiResource('/calendar', CalendarController::class);
