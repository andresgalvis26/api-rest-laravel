<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\PostController as PostV1;
use App\Http\Controllers\Api\V2\PostController as PostV2;


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

// V1 API
Route::apiResource('v1/posts', PostV1::class)
    ->only(['index', 'show', 'destroy'])
    ->middleware('auth:sanctum');

// V2 API
Route::apiResource('v2/posts', PostV2::class)
    ->only(['index', 'show'])
    ->middleware('auth:sanctum');

Route::post('login', [
    App\Http\Controllers\Api\LoginController::class,
    'login'
]);