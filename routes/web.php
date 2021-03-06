<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ClassMemberController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', fn () => Inertia::render('Dashboard'))->name('dashboard');

    // Class Controller
    Route::middleware(['role:teacher'])->post('/class', [ClassController::class, 'store'])->name('class.create');
    Route::middleware(['role:teacher'])->get('/class/create', [ClassController::class, 'createForm'])->name('class.form.create');
    Route::get('/classes', [ClassController::class, 'index'])->name('classes');
    Route::get('/class-forum/{id}', [ClassController::class, 'theClass'])->name('class');

    // Comment Controller
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.create');
    Route::get('/comment/{postId}', [CommentController::class, 'get'])->name('comments');

    // Class Member Controller
    Route::get('/join-class', [ClassMemberController::class, 'join'])
        ->name('class-member.join');
    Route::post('/join-class', [ClassMemberController::class, 'store'])
        ->name('class-member.store');

    // Post Controller
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
});



Route::get('/demo', function (Request $request) {
    return $request->user() ?? "Hello world";
});