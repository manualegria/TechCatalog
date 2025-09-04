<?php

use App\Http\Controllers\CampusController;
use App\Http\Middleware\AuthorizedMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/campuses', [CampusController::class, 'index'])
    ->name('campus.index')
    ->middleware(AuthorizedMiddleware::class . ':Sedes.showCampuses');

Route::get('/campuses/create', [CampusController::class, 'create'])
    ->name('campus.create')
    ->middleware(AuthorizedMiddleware::class . ':Sedes.createCampuses');

Route::get('/campuses/edit/{id}', [CampusController::class, 'edit'])
    ->name('campus.edit')
    ->middleware(AuthorizedMiddleware::class . ':Sedes.updateCampuses');

Route::post('/campuses/store', [CampusController::class, 'store'])
    ->name('campus.store')
    ->middleware(AuthorizedMiddleware::class . ':Sedes.createCampuses');

Route::put('/campuses/update', [CampusController::class, 'update'])
    ->name('campus.update')
    ->middleware(AuthorizedMiddleware::class . ':Sedes.updateCampuses');

Route::delete('/campuses/delete/{id}', [CampusController::class, 'delete'])
    ->name('campus.delete')
    ->middleware(AuthorizedMiddleware::class . ':Sedes.deleteCampuses');
