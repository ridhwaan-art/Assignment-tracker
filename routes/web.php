<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssignmentController;

Route::get('/', function () {
    return view('home');
});

Route::resource('assignments', AssignmentController::class);
Route::get('/assignments/create', [AssignmentController::class, 'create'])->name('assignments.create');
Route::get('/assignments/index', [AssignmentController::class, 'index'])->name('assignments.index');
Route::post('/assignments/{assignment}/complete', [AssignmentController::class, 'complete'])->name('assignments.complete');
Route::delete('/assignments/{assignment}', [AssignmentController::class, 'destroy'])->name('assignments.destroy');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/assignments/{assignment}/edit', [AssignmentController::class, 'edit'])->name('assignments.edit');
Route::put('/assignments/{assignment}', [AssignmentController::class, 'update'])->name('assignments.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

