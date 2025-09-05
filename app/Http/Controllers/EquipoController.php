<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\equipos;
use App\Models\area; 
use App\Models\Campus;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class EquipoController extends Controller
{
    public function index(Request $request) {
        if(!empty($request-> records_per_page)) {

            $request->records_per_page = $request->records_per_page <= env('PAGINATION_MAX_SIZE')
                                                                     ? $request->records_per_page
                                                                     : env('PAGINATION_MAX_SIZE');


        } else {
            $request->records_per_page = env('PAGINATION_DEFAULT_SIZE');
        }

        $equipo = equipos::where('brand', 'LIKE',"%$request->filter%")
                    -> paginate($request->records_per_page);

        return view('equipos.index', ['equipos' => $equipo, 'data' => $request]);
    }

    public function show($id){
        $equipo = equipos::find($id);
 
       if (empty($equipo)) {
         Session::flash('message', ['content' => "El Equipo con id '$id' no existe", 'type' => 'error']);
         return redirect()->route('Equipos.index');
       }
 
          return view('equipos.show', compact('equipo'));
     }

     
    public function create() {

        $area = Area::all();
        $campus = Campus::all();
        return view('equipos.create', ['areas' => $area, 'campuses' => $campus] );
    }

    public function edit($id) {

        $equipo = equipos::find($id);
        $campus = Campus::all();
        $area = Area::all();

        if (empty($equipo)) {

            Session::flash('message', ['content' => "El Equipo con id '$id' no existe", 'type' => 'error']);
            return redirect()->action([EquipoController::class, 'index']);
        }

        //return view('equipo.edit', ['equipos' => $equipo]);
        return view('equipos.edit', ['equipos' => $equipo,'campuses'  => $campus, 'areas' => $area]);
       // return view('equipos.edit', compact('equipo', 'campuses', 'areas'));
    }

    public function delete($id) {

        try {

            $equipo = equipo::find($id);

            if (empty($equipo)) {

                Session::flash('message', ['content' => "El Equipo con id '$id' no existe", 'type' => 'error']);
            }

            $equipo->delete();

            Session::flash('message', ['content' => 'Equipo eliminado con éxito', 'type' => 'success']);
            return redirect()->action([EquipoController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
    }

    public function store(Request $request) {

        Validator::make($request->all(), [

            'serial' => 'required|max:64',
            'model' => 'required|string|max:255',
            'specifications' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'area_id' => 'required|exists:areas,id',
            'campuses_id' => 'required|exists:campuses,id'
        ],
        [
            'serial.required' => 'El serial es obligatorio.',
            'specifications.required' => 'El serial es obligatorio.',
            'brand.required' => 'El serial es obligatorio.',
            'model.required' => 'La dirección es obligatoria.',
            'area_id.required' => 'La empresa es obligatoria.',
            'campuses_id.required' => 'La sede es obligatoria.',
           
         ])->validate();

        try {

            $equipo = new Equipos();
            $equipo->serial = $request->serial;
            $equipo->specifications = $request->specifications;
            $equipo->brand = $request->brand;
            $equipo->model = $request->model;
            $equipo->type = $request->type;
            $equipo->owner = $request->owner;
            $equipo->area_id = $request->area_id;
            $equipo->campuses_id = $request->campuses_id;
            $equipo->serial_peripheral = $request->serial_peripheral;
            $equipo->brand_peripheral = $request->brand_peripheral;
            $equipo->type_peripheral = $request->type_peripheral;
            $equipo->price = $request->price;
           

            $equipo->save();

            Session::flash('message', ['content' => 'Equipo creada con éxito', 'type' => 'success']);
            return redirect()->action([EquipoController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
    }

    public function update(Request $request) {

        try {
            Validator::make($request->all(), [

                'equipo_id' => 'required|numeric|min:1',
                'specifications' => 'required|max:64',
            ],
            [
                'equipo_id.required' => 'El equipo_id es obligatorio.',
                'equipo_id.numeric' => 'El equipo_id debe ser un número.',
                'equipo_id.min' => 'El equipo_id no puede ser menor a :min.',
              
            ])->validate();

            $equipo = equipos::find($request->equipo_id);



            $equipo = equipos::find($request->equipo_id);


            $equipo = equipos::find($request->equipo_id);


            $equipo = equipo::find($request->equipo_id);


            if (empty($equipo)) {

                Session::flash('message', ['content' => "El Equipo con id '$request->equipo_id' no existe", 'type' => 'error']);
               return redirect()->action([EquipoController::class, 'index']);
            }


            $equipo->area_id = $request->area_id;


            $equipo->area_id = $request->area_id;


            $equipo->area_id = $request->area_id;


            $equipo->company_id = $request->area_id;

            $equipo->campuses_id = $request->campuses_id;
            $equipo->specifications = $request->specifications;
            $equipo->owner = $request->owner;
            $equipo->save();

            Session::flash('message', ['content' => 'Equipo editado con éxito', 'type' => 'success']);
            return redirect()->action([EquipoController::class, 'index']);;

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
    }

 
}


