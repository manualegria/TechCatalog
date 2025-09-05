<?php

use App\Http\Controllers\EquipoController;
use App\Http\Middleware\AuthorizedMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/equipos', [EquipoController::class, 'index'])
    ->name('equipos.index')
    ->middleware(AuthorizedMiddleware::class . ':Equipos.showEpuipos');

Route::get('/equipos/show/{id}', [EquipoController::class, 'show'])
    ->name('equipos.show')
    ->middleware(AuthorizedMiddleware::class . ':Equipos.showEpuipos');

Route::get('/equipos/create', [EquipoController::class, 'create'])
    ->name('equipos.create')
    ->middleware(AuthorizedMiddleware::class . ':Equipos.createEpuipos');

Route::get('/equipos/edit/{id}', [EquipoController::class, 'edit'])
    ->name('equipos.edit')
    ->middleware(AuthorizedMiddleware::class . ':Equipos.updateEquipos');

Route::post('/equipos/store', [EquipoController::class, 'store'])
    ->name('equipos.store')
    ->middleware(AuthorizedMiddleware::class . ':Equipos.createEpuipos');

Route::put('/equipos/update', [EquipoController::class, 'update'])
 ->name('equipos.update')
 ->middleware(AuthorizedMiddleware::class . ':Equipos.updateEquipos');

 Route::delete('/equipos/delete/{id}', [EquipoController::class, 'delete'])
->name('equipos.delete')
->middleware(AuthorizedMiddleware::class . ':Equipos.deleteEpuipos');


Route::delete('/equipos/delete/{id}', [EquipoController::class, 'delete'])
    ->name('equipos.delete')
    ->middleware(AuthorizedMiddleware::class . ':Equipos.deleteEpuipos');
