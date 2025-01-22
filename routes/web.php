<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PersonalDetailController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\GithubRepositoryController;
use App\Http\Controllers\DashboardController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/postform', [PostController::class, 'postform'])->name('posts.postform');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
    //Route::post('/posts/{id}/comment', [PostController::class, 'comment'])->name('posts.comment');
    Route::post('posts/{id}/comment', [PostController::class, 'comment'])->name('posts.comment');
});
Route::middleware('auth')->group(function () {
    Route::resource('personal-details', PersonalDetailController::class);
    Route::resource('educations', EducationController::class);
    Route::resource('work-experiences', WorkExperienceController::class);
    Route::resource('github-repositories', GithubRepositoryController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profileInformation', [DashboardController::class, 'combinedIndex'])->name('profileInformation.combinedIndex');   
});
require __DIR__.'/auth.php';
