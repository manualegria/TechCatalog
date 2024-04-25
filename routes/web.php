<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\CitiesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/sections', [SectionsController::class, 'index'])->name('sections.index');
Route::get('/sections/create', [SectionsController::class, 'create'])->name('sections.create');
Route::get('/sections/edit/{id}', [SectionsController::class, 'edit'])->name('sections.edit');

Route::post('/sections/store', [SectionsController::class, 'store'])->name('sections.store');
Route::put('/sections/update', [SectionsController::class, 'update'])->name('sections.update');
Route::delete('/sections/delete/{id}', [SectionsController::class, 'delete'])->name('sections.delete');


Route::get('/cities', [CitiesController::class, 'index'])->name('cities.index');
Route::get('/cities/create', [CitiesController::class, 'create'])->name('cities.create');
Route::get('/cities/edit/{id}', [CitiesController::class, 'edit'])->name('cities.edit');

Route::post('/cities/store', [CitiesController::class, 'store'])->name('cities.store');
Route::put('/cities/update', [CitiesController::class, 'update'])->name('cities.update');
Route::delete('/cities/delete/{id}', [CitiesController::class, 'delete'])->name('cities.delete');

