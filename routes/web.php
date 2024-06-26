<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [PostController::class, 'index'])->name('index');

Route::get('/posts/likeposts', [PostController::class, 'likeposts'])->name('likeposts');

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::post('/posts', 'store')->name('store');
    Route::get('/posts/create', 'create')->name('create');
    Route::get('/posts/{post}', 'show')->name('show');
    Route::put('/posts/{post}', 'update')->name('update');
    Route::delete('/posts/{post}', 'delete')->name('delete');
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
    Route::get('/posts/like/{id}', 'like')->name('post.like');
    Route::get('/posts/unlike/{id}', 'unlike')->name('post.unlike');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/profile/{id}',[ProfileController::class,'get_user']);
Route::get('/follow/status/{id}',[FollowController::class,'check_following']);
Route::post('/follow/add',[FollowController::class,'following']);
Route::post('/follow/remove',[FollowController::class,'unfollowing']);


require __DIR__.'/auth.php';
