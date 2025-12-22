<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

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
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::view('chat','chat');

Route::get('posts',[PostController::class,'index'])->name('posts.index')->middleware('auth');
Route::get('posts/create',[PostController::class,'create'])->name('posts.create')->middleware('auth');
Route::post('posts/store',[PostController::class,'store'])->name('posts.store')->middleware('auth');
Route::get('posts/show/{id}',[PostController::class,'show'])->name('post.show')->middleware('auth');
Route::get('posts/edit/{id}',[PostController::class,'edit'])->name('posts.edit')->middleware('auth');
Route::put('posts/update/{id}',[PostController::class,'update'])->name('posts.update')->middleware('auth');
Route::delete('posts/delete/{id}',[PostController::class,'destroy'])->name('posts.destroy')->middleware('auth');

Route::post('comment',[HomeController::class,'saveComment'])->name('comment.save');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//require __DIR__.'/auth.php';


