<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class CompanyController extends Controller
{
    public function index(Request $request) {
        if(!empty($request-> records_per_page)) {

            $request->records_per_page = $request->records_per_page <= env('PAGINATION_MAX_SIZE')
                                                                     ? $request->records_per_page
                                                                     : env('PAGINATION_MAX_SIZE');


        } else {
            $request->records_per_page = env('PAGINATION_DEFAULT_SIZE');
        }

        $company = Company::where('name', 'LIKE',"%$request->filter%")
                    -> paginate($request->records_per_page);

        return view('companies.index', ['companies' => $company, 'data' => $request]);
    }

    public function create() {

        return view('companies.create');
    }

    public function edit($id) {

        $company = Company::find($id);

        if (empty($company)) {

            Session::flash('message', ['content' => "La Empresa con id '$id' no existe", 'type' => 'error']);
            return redirect()->action([CompanyController::class, 'index']);
        }

        return view('companies.edit', ['company' => $company]);
    }

    public function delete($id) {

        try {

            $company = Company::find($id);

            if (empty($company)) {

                Session::flash('message', ['content' => "La Empresa con id '$id' no existe", 'type' => 'error']);
            }

            $company->delete();

            Session::flash('message', ['content' => 'Empresa eliminada con éxito', 'type' => 'success']);
            return redirect()->action([CompanyController::class, 'index']);

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

            $company = new Company();
            $company->name = $request->name;
            $company->nit = $request->nit;

            $company->save();

            Session::flash('message', ['content' => 'Empresa creada con éxito', 'type' => 'success']);
            return redirect()->action([CompanyController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
    }

    
    public function update(Request $request) {

        try {
            Validator::make($request->all(), [

                'company_id' => 'required|numeric|min:1',
                'name' => 'required|max:64',
            ],
            [
                'company_id.required' => 'El company_id es obligatorio.',
                'company_id.numeric' => 'El company_id debe ser un número.',
                'company_id.min' => 'El company_id no puede ser menor a :min.',
                'name.required' => 'El nombre es obligatorio.',
                'name.max' => 'El nombre no puede ser mayor a :max caracteres.',
            ])->validate();

            $company = Company::find($request->company_id);

            if (empty($company)) {

                Session::flash('message', ['content' => "La Empresa con id '$request->company_id' no existe", 'type' => 'error']);
               return redirect()->action([CompanyController::class, 'index']);
            }

            $company->name = $request->name;
            $company->save();

            Session::flash('message', ['content' => 'Emoresa editada con éxito', 'type' => 'success']);
            return redirect()->action([CompanyController::class, 'index']);;

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
    }

}
