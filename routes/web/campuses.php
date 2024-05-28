<?php

use App\Http\Controllers\CampusController;
use App\Http\Middleware\AuthorizedMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/campuses', [CampusController::class, 'index'])
     ->name('campus.index')
     ->middleware(AuthorizedMiddleware::class . ':Campuses.showCampueses');

Route::get('/campuses/create', [CampusController::class, 'create'])
     ->name('campus.create')
     ->middleware(AuthorizedMiddleware::class . ':Campuses.createCampueses');

Route::get('/campuses/edit/{id}', [CampusController::class, 'edit'])
     ->name('campuses.edit')
     ->middleware(AuthorizedMiddleware::class . ':Campuses.updateCampueses');

Route::post('/campuses/store', [CampusController::class, 'store'])
     ->name('campuses.store')
     ->middleware(AuthorizedMiddleware::class . ':Campuses.createCampueses');

Route::put('/campuses/update', [CampusController::class, 'update'])
     ->name('campuses.update')
     ->middleware(AuthorizedMiddleware::class, ':Campuses.updateCampueses');

     Route::delete('/campuses/delete/{id}', [CampusController::class, 'delete'])
->name('campuses.delete')
->middleware(AuthorizedMiddleware::class . ':campuses.deleteCampuses');

