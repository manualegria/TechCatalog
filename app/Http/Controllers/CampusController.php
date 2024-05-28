<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Campus;
use Illuminate\Http\Request;
use App\Models\City; 
use App\Models\Company;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CampusController extends Controller
{
    public function index(Request $request) {
        if(!empty($request-> records_per_page)) {

            $request->records_per_page = $request->records_per_page <= env('PAGINATION_MAX_SIZE')
                                                                     ? $request->records_per_page
                                                                     : env('PAGINATION_MAX_SIZE');


        } else {
            $request->records_per_page = env('PAGINATION_DEFAULT_SIZE');
        }

        $campus = Campus::where('name', 'LIKE',"%$request->filter%")
                    -> paginate($request->records_per_page);

        return view('campus.index', ['campuses' => $campus, 'data' => $request]);
    }

    public function create() {

        $city = City::all();
        $company = Company::all();
        return view('campus.create', ['cities' => $city, 'companies' => $company] );
    }

    public function edit($id) {

        $campus = Campus::find($id);

        if (empty($campus)) {

            Session::flash('message', ['content' => "La Sede con id '$id' no existe", 'type' => 'error']);
            return redirect()->action([CampusController::class, 'index']);
        }

        return view('campuses.edit', ['campuses' => $campus]);
    }

    public function delete($id) {

        try {

            $campus = Campus::find($id);

            if (empty($campus)) {

                Session::flash('message', ['content' => "La Sede con id '$id' no existe", 'type' => 'error']);
            }

            $campus->delete();

            Session::flash('message', ['content' => 'Sede eliminada con éxito', 'type' => 'success']);
            return redirect()->action([CampusController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
    }

    public function store(Request $request) {

        Validator::make($request->all(), [

            'name' => 'required|max:64',
            'address' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'city_id' => 'required|exists:cities,id'
        ],
        [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede ser mayor a :max caracteres.',
        //     'address.required' => 'La dirección es obligatoria.',
        //     'address.max' => 'La dirección no puede ser mayor a :max caracteres.',
        //     'company_id.required' => 'La empresa es obligatoria.',
        //     'company_id.exists' => 'La empresa seleccionada no es válida.',
        //     'city_id.required' => 'La ciudad es obligatoria.',
        //     'city_id.exists' => 'La ciudad seleccionada no es válida.',
         ])->validate();

        try {

            $campus = new Campus();
            $campus->name = $request->name;
            $campus->address = $request->address;
            $campus->company_id = $request->company_id;
            $campus->city_id = $request->city_id;
           

            $campus->save();

            Session::flash('message', ['content' => 'Sede creada con éxito', 'type' => 'success']);
            return redirect()->action([CampusController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
    }

    public function update(Request $request) {

        try {
            Validator::make($request->all(), [

                'campus_id' => 'required|numeric|min:1',
                'name' => 'required|max:64',
            ],
            [
                'campus_id.required' => 'El campus_id es obligatorio.',
                'campus_id.numeric' => 'El campus_id debe ser un número.',
                'campus_id.min' => 'El campus_id no puede ser menor a :min.',
                'name.required' => 'El nombre es obligatorio.',
                'name.max' => 'El nombre no puede ser mayor a :max caracteres.',
            ])->validate();

            $campus = Campus::find($request->campus_id);

            if (empty($campus)) {

                Session::flash('message', ['content' => "La Sede con id '$request->campus_id' no existe", 'type' => 'error']);
               return redirect()->action([campusesController::class, 'index']);
            }

            $campus->name = $request->name;
            $campus->address = $request->address;
            $campus->company_id = $request->company_id;
            $campus->city_id = $request->city_id;
            $campus->status = $request->status;
            $campus->save();

            Session::flash('message', ['content' => 'Sede editada con éxito', 'type' => 'success']);
            return redirect()->action([campusesController::class, 'index']);;

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
    }
}
