<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CitiesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;




Route::get('/cities', [CitiesController::class, 'index'])->name('cities.index');
Route::get('/cities/create', [CitiesController::class, 'create'])->name('cities.create');
Route::get('/cities/edit/{id}', [CitiesController::class, 'edit'])->name('cities.edit');

Route::post('/cities/store', [CitiesController::class, 'store'])->name('cities.store');
Route::put('/cities/update', [CitiesController::class, 'update'])->name('cities.update');
Route::delete('/cities/delete/{id}', [CitiesController::class, 'delete'])->name('cities.delete');

