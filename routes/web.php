<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('layouts.home');
});

Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');

Route::post('/students', [StudentsController::class, 'store'])->name('students.store');

Route::get('/students', [StudentsController::class, 'index'])->name('students.index');

Route::get('/students/{student}', [StudentsController::class, 'show'])->name('students.show');

Route::get('/students/{student}/edit', [StudentsController::class, 'edit'])->name('students.edit');

Route::put('/students/{student}/update', [StudentsController::class, 'update'])->name('students.update');

Route::delete('/students/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');