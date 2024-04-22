<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CitiesControllers extends Controller
{
    public function index(){
        return view('cities.index');

    }
  
}
