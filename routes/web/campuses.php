<?php

use App\Http\Controllers\CampusController;
use App\Http\Middleware\AuthorizedMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/campus', [CampusController::class, 'index'])
     ->name('campus.index')
     ->middleware(AuthorizedMiddleware::class . ':Campuses.showCampueses');

Route::get('/campuses/create', [CampusController::class, 'create'])
     ->name('campus.create')
     ->middleware(AuthorizedMiddleware::class . ':Campuses.createCampueses');

Route::get('/campuses/edit/{id}', [CampusController::class, 'edit'])
     ->name('campus.edit')
     ->middleware(AuthorizedMiddleware::class . ':Campuses.updateCampueses');

Route::post('/campuses/store', [CampusController::class, 'store'])
     ->name('campus.store')
     ->middleware(AuthorizedMiddleware::class . ':Campuses.createCampueses');

Route::put('/campuses/update', [CampusController::class, 'update'])
     ->name('campus.update')
     ->middleware(AuthorizedMiddleware::class, ':Campuses.updateCampueses');

     Route::delete('/campuses/delete/{id}', [CampusController::class, 'delete'])
->name('campus.delete')
->middleware(AuthorizedMiddleware::class . ':campuses.deleteCampuses');

