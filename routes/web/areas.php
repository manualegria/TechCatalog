<?php

use App\Http\Controllers\AreaController;
use App\Http\Middleware\AuthorizedMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/areas', [AreaController::class, 'index'])
     ->name('Areas.index')
     ->middleware(AuthorizedMiddleware::class . ':Areas.showAreas');

Route::get('/areas/create', [AreaController::class, 'create'])
     ->name('area.create')
     ->middleware(AuthorizedMiddleware::class . ':Areas.createAreas');

Route::get('/areas/edit/{id}', [AreaController::class, 'edit'])
     ->name('area.edit')
     ->middleware(AuthorizedMiddleware::class . ':Areas.updateAreas');

Route::post('/areas/store', [AreaController::class, 'store'])
     ->name('area.store')
     ->middleware(AuthorizedMiddleware::class . ':Areas.createAreas');

Route::put('/areas/update', [AreaController::class, 'update'])
     ->name('area.update')
     ->middleware(AuthorizedMiddleware::class, ':Areas.updateAreas');

     Route::delete('/areas/delete/{id}', [AreaController::class, 'delete'])
->name('area.delete')
->middleware(AuthorizedMiddleware::class . ':Areas.deleteAreas');

