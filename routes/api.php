<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CountryAPIController;
use App\Http\Controllers\Api\UserAPIController;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Http\Resources\CountryResource;
use App\Models\Country;

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

Route::get('json', function(){
    $user = User::find(1);
    return new UserResource($user);
});

Route::apiResource('countries', CountryAPIController::class);

Route::apiResource("users", UserAPIController::class);

Route::post('/login', [UserAPIController::class, 'login']);
Route::get('/login', [UserAPIController::class, 'login']);