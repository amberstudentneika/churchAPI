<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/post',[App\Http\Controllers\PostController::class,'create']);
//Category Routes
Route::post('/category/store',[App\Http\Controllers\CategoryController::class,'store']);
Route::get('/category/index',[App\Http\Controllers\CategoryController::class,'index']);
Route::get('/category/show/{id}',[App\Http\Controllers\CategoryController::class,'show']);
Route::post('/category/update/{id}',[App\Http\Controllers\CategoryController::class,'update']);
Route::post('/category/delete/{id}',[App\Http\Controllers\CategoryController::class,'destroy']);
//Post Routes
Route::post('/post/store',[App\Http\Controllers\PostController::class,'store']);
Route::get('/post/index',[App\Http\Controllers\PostController::class,'index']);
//Register
Route::post('/register',[App\Http\Controllers\MemberController::class,'store']);
//Login
Route::post('/login',[App\Http\Controllers\MemberController::class,'login']);