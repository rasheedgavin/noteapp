<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

// Optional: Landing page (e.g., welcome view)
// Route::get('/', function () {
//     return view('welcome');
// });

// Ensure authenticated AND verified users can access the dashboard and notes.
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
    Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
    Route::post('/notes', [NoteController::class, 'save'])->name('notes.save');
    Route::get('/notes/{note}/view', [NoteController::class, 'view'])->name('notes.view');
    Route::get('/notes/{note}/edit', [noteController::class, 'edit'])->name('notes.edit');
    Route::put('/notes/{note}/update', [noteController::class, 'update'])->name('notes.update');
    Route::delete('/notes/{note}/delete', [noteController::class, 'delete'])->name('notes.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include Laravel's authentication routes (login, registration, etc.)
require __DIR__ . '/auth.php';
