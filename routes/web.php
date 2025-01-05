<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

use App\Http\Controllers\GithubController;

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

    Route::get('/github', [GithubController::class, 'index'])->name('github.index');
    Route::get('/github/create', [GithubController::class, 'create'])->name('github.create');
    Route::get('/github/search', [GithubController::class, 'search'])->name('github.search');
    Route::post('/github', [GithubController::class, 'store'])->name('github.store');
    Route::get('/github/{id}', [GithubController::class, 'show'])->name('github.show');
});

Route::resource('users', UserController::class)->middleware('auth');

require __DIR__.'/auth.php';