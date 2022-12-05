<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\RouteRegistrar;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('/projects',ProjectController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/projects/{project}/tasks',[TaskController::class, 'store']);

Route::patch('/projects/{project}/tasks/{task}',[TaskController::class,'update']);

Route::delete('/projects/{project}/tasks/{task}',[TaskController::class,'destroy']);

Route::get('/profile',[ProfileController::class,'index']);

Route::patch('/profile',[ProfileController::class,'update']);
