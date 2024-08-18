<?php

use App\Http\Controllers\CompanyController;
use App\Http\Middleware\AuthorizedMiddleware;
use Illuminate\Support\Facades\Route;



Route::get('/companies', [CompanyController::class, 'index'])
->name('companies.index')
->middleware(AuthorizedMiddleware::class . ':Empresas.showCompanies');

Route::get('/companies/create', [CompanyController::class, 'create'])
->name('companies.create')
->middleware(AuthorizedMiddleware::class . ':Empresas.creteCompanies');

Route::get('/companies/edit/{id}', [CompanyController::class, 'edit'])
->name('companies.edit')
->middleware(AuthorizedMiddleware::class . ':Empresas.updateCompanies');

Route::post('/companies/store', [CompanyController::class, 'store'])
->name('companies.store')
->middleware(AuthorizedMiddleware::class . ':Empresas.creteCompanies');

Route::put('/companies/update', [CompanyController::class, 'update'])
->name('companies.update')
->middleware(AuthorizedMiddleware::class . ':Empresas.updateCompanies');

Route::delete('/companies/delete/{id}', [CompanyController::class, 'delete'])
->name('companies.delete')
->middleware(AuthorizedMiddleware::class . ':Empresas.deleteComanies');


