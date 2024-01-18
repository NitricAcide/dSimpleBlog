<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('homepage');
});  

Route::get('/homepage',[App\Http\Controllers\HomeController::class, 'homepage'])->name('homepage');
Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->name('post');
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('postshow');

Auth::routes();

Route::get('/account', [App\Http\Controllers\AccountController::class, 'account'])->name('account');
Route::get('/create-post', [App\Http\Controllers\PostController::class, 'create'])->name('postcreate');
Route::post('/post', [App\Http\Controllers\PostController::class, 'store'])->name('poststore'); 
Route::get('/post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('postedit');
Route::put('/post/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('postupdate');
Route::delete('/post/{post}/delete', [App\Http\Controllers\PostController::class, 'destroy'])->name('postdelete');

