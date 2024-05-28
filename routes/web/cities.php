<?php

use App\Http\Controllers\CitiesController;
use App\Http\Middleware\AuthorizedMiddleware;
use Illuminate\Support\Facades\Route;



Route::get('/cities', [CitiesController::class, 'index'])
->name('cities.index')
->middleware(AuthorizedMiddleware::class . ':Cities.showCities');

Route::get('/cities/create', [CitiesController::class, 'create'])
->name('cities.create')
->middleware(AuthorizedMiddleware::class . ':Cities.creteCities');

Route::get('/cities/edit/{id}', [CitiesController::class, 'edit'])
->name('cities.edit')
->middleware(AuthorizedMiddleware::class . ':Cities.updateCities');


Route::post('/cities/store', [CitiesController::class, 'store'])
->name('cities.store')
->middleware(AuthorizedMiddleware::class . ':Cities.creteCities');

Route::put('/cities/update', [CitiesController::class, 'update'])
->name('cities.update')
->middleware(AuthorizedMiddleware::class . ':Cities.updateCities');

Route::delete('/cities/delete/{id}', [CitiesController::class, 'delete'])
->name('cities.delete')
->middleware(AuthorizedMiddleware::class . ':Cities.deleteCities');

