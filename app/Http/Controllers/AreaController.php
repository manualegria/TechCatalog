<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AreaController extends Controller
{
    public function index(Request $request) {
        $records_per_page = $request->input('records_per_page', env('PAGINATION_DEFAULT_SIZE'));
    
        if ($records_per_page > env('PAGINATION_MAX_SIZE')) {
            $records_per_page = env('PAGINATION_MAX_SIZE');
        }
    
        $filter = $request->input('filter', '');
    
        $areas = Area::where('name', 'LIKE', "%{$filter}%")
                     ->paginate($records_per_page);
    
        // Crear un objeto data con los valores necesarios
        $data = (object) [
            'records_per_page' => $records_per_page,
            'filter' => $filter
        ];
    
        return view('Areas.index', ['areas' => $areas, 'data' => $data]);
    }
    

    public function create() {

        return view('areas.create');
    }

    public function edit($id) {

        $area = Area::find($id);

        if (empty($area)) {

            Session::flash('message', ['content' => "El Area con id '$id' no existe", 'type' => 'error']);
            return redirect()->action([AreaController::class, 'index']);
        }

        return view('area.edit', ['area' => $area]);
    }

    public function delete($id) {

        try {

            $area = Area::find($id);

            if (empty($area)) {

                Session::flash('message', ['content' => "El Area con id '$id' no existe", 'type' => 'error']);
            }

            $area->delete();

            Session::flash('message', ['content' => 'Area eliminada con éxito', 'type' => 'success']);
            return redirect()->action([AreaController::class, 'index']);

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

            $area = new Area();
            $area->name = $request->name;

            $area->save();

            Session::flash('message', ['content' => 'Area creada con éxito', 'type' => 'success']);
            return redirect()->action([AreaController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
    }

    public function update(Request $request) {

        try {
            Validator::make($request->all(), [

                'area_id' => 'required|numeric|min:1',
                'name' => 'required|max:64',
            ],
            [
                'area_id.required' => 'El area_id es obligatorio.',
                'area_id.numeric' => 'El area_id debe ser un número.',
                'area_id.min' => 'El area_id no puede ser menor a :min.',
                'name.required' => 'El nombre es obligatorio.',
                'name.max' => 'El nombre no puede ser mayor a :max caracteres.',
            ])->validate();

            $area = area::find($request->area_id);

            if (empty($area)) {

                Session::flash('message', ['content' => "La sección con id '$request->area_id' no existe", 'type' => 'error']);
                return redirect()->action([AreaController::class, 'index']);
            }

            $area->name = $request->name;
            $area->save();

            Session::flash('message', ['content' => 'Sección editada con éxito', 'type' => 'success']);
            return redirect()->action([AreaController::class, 'index']);;

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
    }
}