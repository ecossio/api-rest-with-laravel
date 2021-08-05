<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\V1\PostController as PostControllerV1;
use App\Http\Controllers\Api\V2\PostController as PostControllerV2;

// V1
Route::apiResource('v1/posts', PostControllerV1::class)
	->only(['index', 'show', 'destroy'])
	->middleware('auth:sanctum');

// V2
Route::apiResource('v2/posts', PostControllerV2::class)
	->only(['index', 'show'])
	->middleware('auth:sanctum');

Route::post('login', [
	LoginController::class,
	'login'
]);
