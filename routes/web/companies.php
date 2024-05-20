<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;




Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
Route::get('/companies/edit/{id}', [CompanyController::class, 'edit'])->name('companies.edit');

Route::post('/companies/store', [CompanyController::class, 'store'])->name('companies.store');
Route::put('/companies/update', [CompanyController::class, 'update'])->name('companies.update');
Route::delete('/companies/delete/{id}', [CompanyController::class, 'delete'])->name('companies.delete');

