<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

// Optional: Landing page (e.g., welcome view)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [noteController::class, 'home'])->name('notes.home');
Route::get('/notes', [noteController::class, 'index'])->name('notes.index');
Route::get('/notes/create', [noteController::class, 'create'])->name('notes.create');
Route::post('/notes', [noteController::class, 'save'])->name('notes.save');
Route::get('/notes/{note}/view', [noteController::class, 'view'])->name('notes.view');
Route::get('/notes/{note}/edit', [noteController::class, 'edit'])->name('notes.edit');
Route::put('/notes/{note}/update', [noteController::class, 'update'])->name('notes.update');
Route::delete('/notes/{note}/delete', [noteController::class, 'delete'])->name('notes.delete');

