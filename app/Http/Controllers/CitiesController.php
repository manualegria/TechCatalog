<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\city;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CitiesController extends Controller
{
    public function index(Request $request) {
        if(!empty($request-> records_per_page)) {

            $request->records_per_page = $request->records_per_page <= env('PAGINATION_MAX_SIZE')
                                                                     ? $request->records_per_page
                                                                     : env('PAGINATION_MAX_SIZE');


        } else {
            $request->records_per_page = env('PAGINATION_DEFAULT_SIZE');
        }

        $city = city::where('name', 'LIKE',"%$request->filter%")
                    -> paginate($request->records_per_page);

        return view('cities.index', ['cities' => $city, 'data' => $request]);
    }

    public function create() {

        return view('cities.create');
    }

    public function edit($id) {

        $city = city::find($id);

        if (empty($city)) {

            Session::flash('message', ['content' => "La ciudad con id '$id' no existe", 'type' => 'error']);
            return redirect()->action([CitiesController::class, 'index']);
        }

        return view('cities.edit', ['city' => $city]);
    }

    public function delete($id) {

        try {

            $city = city::find($id);

            if (empty($city)) {

                Session::flash('message', ['content' => "La Ciudad con id '$id' no existe", 'type' => 'error']);
            }

            $city->delete();

            Session::flash('message', ['content' => 'Ciudad eliminada con éxito', 'type' => 'success']);
            return redirect()->action([CitiesController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
    }

    public function store(Request $request) {

        Validator::make($request->all(), [

            'name' => 'required|max:64',
        ],
        [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede ser mayor a :max caracteres.',
        ])->validate();

        try {

            $city = new city();
            $city->name = $request->name;

            $city->save();

            Session::flash('message', ['content' => 'Ciudad creada con éxito', 'type' => 'success']);
            return redirect()->action([CitiesController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
    }

    public function update(Request $request) {

        try {
            Validator::make($request->all(), [

                'city_id' => 'required|numeric|min:1',
                'name' => 'required|max:64',
            ],
            [
                'city_id.required' => 'El city_id es obligatorio.',
                'city_id.numeric' => 'El city_id debe ser un número.',
                'city_id.min' => 'El city_id no puede ser menor a :min.',
                'name.required' => 'El nombre es obligatorio.',
                'name.max' => 'El nombre no puede ser mayor a :max caracteres.',
            ])->validate();

            $city = city::find($request->city_id);

            if (empty($city)) {

                Session::flash('message', ['content' => "La Ciudad con id '$request->city_id' no existe", 'type' => 'error']);
               return redirect()->action([CitiesController::class, 'index']);
            }

            $city->name = $request->name;
            $city->save();

            Session::flash('message', ['content' => 'Ciudad editada con éxito', 'type' => 'success']);
            return redirect()->action([CitiesController::class, 'index']);;

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
    }
}