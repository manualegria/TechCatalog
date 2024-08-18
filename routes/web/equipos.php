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
<<<<<<< HEAD
<<<<<<< HEAD
 ->middleware(AuthorizedMiddleware::class . ':Equipos.updateEquipos');
=======
 ->middleware(AuthorizedMiddleware::class, ':Equipos.updateEquipos');
>>>>>>> 99ecfd50afcf39f13f0a5898d7f4a7693d72cea5
=======
<<<<<<< Updated upstream
 ->middleware(AuthorizedMiddleware::class, ':Equipos.updateEquipos');
=======
 ->middleware(AuthorizedMiddleware::class . ':Equipos.updateEquipos');
>>>>>>> Stashed changes
>>>>>>> emirDev

 Route::delete('/equipos/delete/{id}', [EquipoController::class, 'delete'])
->name('equipos.delete')
->middleware(AuthorizedMiddleware::class . ':Equipos.deleteEpuipos');

