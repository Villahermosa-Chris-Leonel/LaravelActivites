<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('add','add');
Route::post('add', [PostController::class, 'addData']);
Route::get('list', [PostController::class, 'show']);
Route::get('delete/{id}', [PostController::class, 'delete']);
Route::get('edit-data/{id}', [PostController::class, 'edit']);
Route::post('edit', [PostController::class, 'update']);