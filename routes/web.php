<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index']);
Route::get('/details/{slug}/{id}',[HomeController::class,'details']);
Route::get('/all-categories',[HomeController::class,'all_category']);
Route::get('/category/{slug}/{id}',[HomeController::class,'category']);
Route::post('/save-comment/{slug}/{id}',[HomeController::class,'save_comment']);
Route::get('/save-post-form',[HomeController::class,'save_post_form']);
Route::get('/save-post-form',[HomeController::class,'save_post_form']);
Route::get('/manage-posts',[HomeController::class,'manage_post']);



//admin 
Route::get('/admin/login',[AdminController::class,'login']);
Route::post('/admin/login',[AdminController::class,'submit_login']);
Route::get('/admin/logout',[AdminController::class,'logout']);
Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
//Comment
Route::get('admin/comment/{id}/delete',[AdminController::class,'delete_comment']);
Route::get('/admin/comment',[AdminController::class,'comments']);
//Users
Route::get('admin/user/{id}/delete',[AdminController::class,'delete_user']);
Route::get('/admin/user',[AdminController::class,'users']);
//category
Route::get('admin/category/{id}/delete',[CategoryController::class,'destroy']);
Route::resource('admin/category',CategoryController::class);
//post
Route::get('admin/post/{id}/delete',[PostController::class,'destroy']);
Route::resource('admin/post',PostController::class);
//setings
Route::get('/admin/setting',[SettingController::class,'index']);
Route::post('/admin/setting',[SettingController::class,'save_setting']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
