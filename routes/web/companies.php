<?php

use App\Http\Controllers\RolesController;
use App\Http\Middleware\AuthorizedMiddleware;
use Illuminate\Support\Facades\Route;



Route::get('/companies', [CompanyController::class, 'index'])
->name('companies.index')
->middleware(AuthorizedMiddleware::class . ':Companies.showCompanies');

Route::get('/companies/create', [CompanyController::class, 'create'])
->name('companies.create')
->middleware(AuthorizedMiddleware::class . ':Companies.creteCompanies');

Route::get('/companies/edit/{id}', [CompanyController::class, 'edit'])
->name('companies.edit')
->middleware(AuthorizedMiddleware::class . ':Companies.updateCompanies');

Route::post('/companies/store', [CompanyController::class, 'store'])
->name('companies.store')
->middleware(AuthorizedMiddleware::class . ':Companies.creteCompanies');

Route::put('/companies/update', [CompanyController::class, 'update'])
->name('companies.update')
->middleware(AuthorizedMiddleware::class . ':Companies.updateCompanies');

Route::delete('/companies/delete/{id}', [CompanyController::class, 'delete'])
->name('companies.delete')
->middleware(AuthorizedMiddleware::class . ':Companies.deleteCpmanies');


