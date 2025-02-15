<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/tasks', [HomeController::class,'tasks'])->middleware(['auth', 'verified'])->name('tasks');
Route::get('/getTask/{id}',[HomeController::class,'getTask'])->middleware(['auth', 'verified']);
Route::get('/createGroup',[HomeController::class,'createGroup'])->middleware(['auth', 'verified'])->name('createGroup');
Route::get('/createDay', [HomeController::class,'createDay'])->middleware(['auth', 'verified'])->name('createDay');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
