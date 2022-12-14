<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\RegisterController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('signUp', [RegisterController::class, 'signUp']);
Route::post('login', [RegisterController::class, 'login']);

Route::middleware('auth:api')->group(function () {

    Route::get('logout', [RegisterController::class, 'logout']);
    Route::get('show_all_users',[MessageController::class,'show']);
    Route::post('send_message',[MessageController::class,'store']);
    Route::get('show_specific_conversation/{recipient_id}',[MessageController::class,'index']);
    Route::get('show_my_conversation',[MessageController::class,'show_my_conversations']);



});
