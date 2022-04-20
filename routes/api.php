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
//Announcement Routes
Route::post('/announcement/store',[App\Http\Controllers\AnnouncementController::class,'store']);
Route::get('/announcement/index',[App\Http\Controllers\AnnouncementController::class,'index']);
Route::post('/announcement/show/{id}',[App\Http\Controllers\AnnouncementController::class,'show']);
Route::post('/announcement/update/{id}',[App\Http\Controllers\AnnouncementController::class,'update']);
Route::post('/announcement/delete/{id}',[App\Http\Controllers\AnnouncementController::class,'destroy']);
//Category Routes
Route::post('/category/store',[App\Http\Controllers\CategoryController::class,'store']);
Route::get('/category/index',[App\Http\Controllers\CategoryController::class,'index']);
Route::post('/category/show/{id}',[App\Http\Controllers\CategoryController::class,'show']);
Route::post('/category/update/{id}',[App\Http\Controllers\CategoryController::class,'update']);
Route::post('/category/delete/{id}',[App\Http\Controllers\CategoryController::class,'destroy']);
//Post Routes
Route::post('/post/store',[App\Http\Controllers\PostController::class,'store']);
Route::get('/post/index',[App\Http\Controllers\PostController::class,'index']);
Route::post('/post/show/{id}',[App\Http\Controllers\PostController::class,'show']);
Route::post('post/update/{id}',[App\Http\Controllers\PostController::class,'update']);
Route::post('/post/delete/{id}',[App\Http\Controllers\PostController::class,'destroy']);
//Like Routes
Route::post('/like/store',[App\Http\Controllers\LikeController::class,'store']);
//Comment Routes
Route::post('/comment/store',[App\Http\Controllers\CommentController::class,'store']);
Route::post('/comment/delete/{id}',[App\Http\Controllers\CommentController::class,'destroy']);
Route::post('/comment/show/{id}',[App\Http\Controllers\CommentController::class,'show']);
Route::post('/comment/update/{id}',[App\Http\Controllers\CommentController::class,'update']);
//Register
Route::post('/register',[App\Http\Controllers\MemberController::class,'store']);
Route::post('/upload/profileimage/store',[App\Http\Controllers\MemberController::class,'updateProfileImage']);
//Login
Route::post('/login',[App\Http\Controllers\MemberController::class,'login']);