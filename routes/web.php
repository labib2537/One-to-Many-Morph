<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/add_video', [VideoController::class, 'add'])->name('add_video');
Route::get('/add_post', [PostController::class, 'add'])->name('add_post');
Route::post('/insert_video', [VideoController::class, 'insert'])->name('insert_video');
Route::post('/insert_post', [PostController::class, 'insert'])->name('insert_post');
Route::get('/show_video', [VideoController::class, 'list'])->name('show_video');
Route::get('/show_post', [PostController::class, 'list'])->name('show_post');
Route::post('/add_video_comment', [VideoController::class, 'addComment'])->name('add_video_comment');
Route::post('/add_post_comment', [PostController::class, 'addComment'])->name('add_post_comment');
Route::post('/store_video_comment', [VideoController::class, 'CommentStore'])->name('store_video_comment');
Route::post('/store_post_comment', [PostController::class, 'CommentStore'])->name('store_post_comment');