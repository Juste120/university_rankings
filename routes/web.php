<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CriterionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/home', [HomeController::class, 'index'])->name('index');
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');


    Route::get('/universities', [UniversityController::class, 'index'])->name('universities.index');
    Route::get('/universities/create', [UniversityController::class, 'create'])->name('universities.create');
    Route::post('/universities/store', [UniversityController::class, 'store'])->name('universities.store');
    Route::get('/universities/{id}/edit', [UniversityController::class, 'edit'])->name('universities.edit');
    Route::patch('/universities/{id}', [UniversityController::class, 'update'])->name('universities.update');
    Route::delete('/universities/{id}', [UniversityController::class, 'destroy'])->name('universities.destroy');

    Route::get('/criteria', [CriterionController::class, 'index'])->name('criteria.index');
    Route::get('/criteria/create', [CriterionController::class, 'create'])->name('criteria.create');
    Route::post('/criteria', [CriterionController::class, 'store'])->name('criteria.store');
    Route::get('/criteria/{criterion}/edit', [CriterionController::class, 'edit'])->name('criteria.edit');
    Route::patch('/criteria/{criterion}', [CriterionController::class, 'update'])->name('criteria.update');
    Route::delete('/criteria/{criterion}', [CriterionController::class, 'destroy'])->name('criteria.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
