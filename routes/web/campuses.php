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
<<<<<<< HEAD
<<<<<<< HEAD
     ->middleware(AuthorizedMiddleware::class . ':Sedes.updateCampuses');
=======
     ->middleware(AuthorizedMiddleware::class, ':Sedes.updateCampuses');
>>>>>>> 99ecfd50afcf39f13f0a5898d7f4a7693d72cea5
=======
<<<<<<< Updated upstream
     ->middleware(AuthorizedMiddleware::class, ':Sedes.updateCampuses');
=======
          ->middleware(AuthorizedMiddleware::class . ':Sedes.updateCampuses');

>>>>>>> Stashed changes
>>>>>>> emirDev

     Route::delete('/campuses/delete/{id}', [CampusController::class, 'delete'])
->name('campus.delete')
->middleware(AuthorizedMiddleware::class . ':Sedes.deleteCampuses');

