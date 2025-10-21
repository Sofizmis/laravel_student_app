<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CityController;

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

Route::get('/cities/create', [CityController::class, 'create'])->name('cities.create');

Route::post('/cities', [CityController::class, 'store'])->name('cities.store');

Route::get('/cities', [CityController::class, 'index'])->name('cities.index');

Route::get('/cities/{city}', [CityController::class, 'show'])->name('cities.show');

Route::get('/cities/{city}/edit', [CityController::class, 'edit'])->name('cities.edit');

Route::put('/cities/{city}/update', [CityController::class, 'update'])->name('cities.update');

Route::delete('/cities/{city}', [CityController::class, 'destroy'])->name('cities.destroy');