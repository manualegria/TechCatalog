<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', [HomeController::class, 'index'])->name('home.index');


include('web/cities.php');
include('web/companies.php');

