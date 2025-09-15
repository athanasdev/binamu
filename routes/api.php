<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AppinfoController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/app_info', [AppinfoController::class, 'app_info']);
Route::get('/app_image', [AppinfoController::class, 'app_image']);
Route::get('/top_users', [AppinfoController::class, 'top_users']);
Route::get('/faqs', [AppinfoController::class, 'faqs']);

Route::post('/check_ip', [AppinfoController::class, 'check_ip']);


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function(){

    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/daily_check_in', [AuthController::class, 'daily_check_in']);
    Route::post('/watch_and_earn', [AuthController::class, 'watch_and_earn']);
    Route::post('/lucky_spin', [AuthController::class, 'lucky_spin']);
    Route::post('/withdraw', [AuthController::class, 'withdraw']);
    Route::get('/team_members/{user_id}', [AuthController::class, 'team_members']);
    Route::get('/withdraw_history/{user_id}', [AuthController::class, 'withdraw_history']);
    Route::get('/refur_bonus_history/{user_id}', [AuthController::class, 'refur_bonus_history']);
    Route::get('/daily_checkin_history/{user_id}', [AuthController::class, 'daily_checkin_history']);

    
});