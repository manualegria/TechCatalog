<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Middleware\AuthorizedMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/employees', [EmpleadoController::class, 'index'])
     ->name('employees.index')
     ->middleware(AuthorizedMiddleware::class . ':Empleados.showEmployees');

Route::get('/employees/show/{id}', [EmpleadoController::class, 'show'])
     ->name('employees.show')
     ->middleware(AuthorizedMiddleware::class . ':Empleados.showEmployees');


Route::get('/employees/create', [EmpleadoController::class, 'create'])
     ->name('employees.create')
     ->middleware(AuthorizedMiddleware::class . ':Empleados.createEmployees');

Route::post('/employees/store', [EmpleadoController::class, 'store'])
     ->name('employees.store')
     ->middleware(AuthorizedMiddleware::class . ':Empleados.createEmployees');

Route::get('/employees/edit/{id}', [EmpleadoController::class, 'edit'])
     ->name('employees.edit')
     ->middleware(AuthorizedMiddleware::class . ':Empleados.updateEmployees');

// Route::put('/employees/update', [EmpleadoController::class, 'update'])
//      ->name('employees.update')
//      ->middleware(AuthorizedMiddleware::class . ':Empleados.updateEmployees');


     Route::put('/employees/update/{id}', [EmpleadoController::class, 'update'])
     ->name('employees.update')
     ->middleware(AuthorizedMiddleware::class . ':Empleados.updateEmployees');


// Rutas para importación desde Excel
// Route::get('/employees/import', [EmpleadoController::class, 'showImportForm'])
//      ->name('employees.import.form')
//      ->middleware(AuthorizedMiddleware::class . ':Empleados.importEmployees');

Route::post('/employees/import', [EmpleadoController::class, 'import'])
     ->name('employees.import')
     ->middleware(AuthorizedMiddleware::class . ':Empleados.importEmployees');

Route::delete('/employees/delete/{id}', [EmpleadoController::class, 'delete'])
->name('employees.delete')
->middleware(AuthorizedMiddleware::class . ':Empleados.deleteEmployees');