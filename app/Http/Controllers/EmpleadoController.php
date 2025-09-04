<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Imports\EmpleadosImport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


class EmpleadoController extends Controller
{
    public function index(Request $request)
    {
        $recordsPerPage = $request->records_per_page && $request->records_per_page <= env('PAGINATION_MAX_SIZE')
            ? $request->records_per_page
            : env('PAGINATION_DEFAULT_SIZE');
    
        $query = Empleado::query();
    
        if (!empty($request->filter))  {
            $query->where(function ($q) use ($request) {
                $q->where('nombres', 'LIKE', "%{$request->filter}%")
                  ->orWhere('apellidos', 'LIKE', "%{$request->filter}%");
            });
        }
    
        $emplpyees = $query->paginate($recordsPerPage);
    
        return view('employee.index', [
            'employees' => $emplpyees,
            'data' => (object)[
                'records_per_page' => $recordsPerPage,
                'filter' => $request->filter,
            ]
        ]);
    }
    

    public function create(){

        
        $empleado = Empleado::all();
        return view('employee.create', [ 'employees' => $empleado]);


    }

    public function store(Request $request)
    {
        $request->validate([
        'numero_empleado',
        'codigo_interno',
        'lugar_trabajo',
        'nivel_riesgo',
        'fecha_ingreso',
        'sexo',
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'cedula' => 'required|numeric|unique:employees,cedula',
            'lugar_nacimiento',
            'lugar_expedicion',
            'fecha_nacimiento',
            'rh',
            'edad',
            'correo' => 'nullable|email|max:100',
            'correo_corporativo' => 'nullable|email|max:100',
            'direccion' => 'nullable|string|max:255',
            'barrio',
            'celular' => 'nullable|string|max:20',
            
        'cargo',
        'area',
        'tipo_contrato',
        'eps',
        'afp',
        'arl',
        'cesantias',
        'caja_compensacion',
        'nombre_familiar_1',
        'parentesco_1',
        'telefono_familiar_1',
        'nombre_familiar_2',
        'parentesco_2',
        'telefono_familiar_2',
        'observaciones',
        ]);
    
        try {
            $empleado = new Empleado();
            $empleado->fill($request->only($empleado->getFillable())); // Usa todos los campos disponibles
            $empleado->save();
    
            Session::flash('message', ['content' => 'Empleado creado con éxito', 'type' => 'success']);
            return redirect()->action([EmpleadoController::class, 'index']);
        } catch (\Exception $ex) {
            Log::error($ex);
            Session::flash('message', ['content' => "Error al crear el empleado: " . $ex->getMessage(), 'type' => 'error']);
            return redirect()->back()->withInput();
        }
    }
    

    public function show($id)
{
    $empleado = Empleado::findOrFail($id);
    return view('employee.show', compact('empleado'));
}


public function edit($id)
{
    $empleado = Empleado::findOrFail($id); // Busca al empleado o lanza 404 si no existe

    if(empty($empleado)){
        Session::flash('message', ['content' => "El Emppleado con id '$id' no existe", 'type' => 'error']);
            return redirect()->action([EmpleadoCOntroller::class, 'index']);
    }

    return view('employee.edit', compact('empleado')); // Retorna la vista con los datos
}


public function update(Request $request, $id )
{
    $empleado = Empleado::findOrFail($id);
    try {

    Validator::make($request->all(), [

      
        'numero_empleado',
        'codigo_interno',
        'lugar_trabajo',
        'nivel_riesgo',
        'fecha_ingreso',
        'sexo',
        'nombres' ,
        'apellidos' ,
        'cedula' ,
        'lugar_nacimiento',
        'lugar_expedicion',
        'fecha_nacimiento',
        'rh',
        'edad',
        'correo',
        'correo_corporativo' ,
        'direccion' ,
        'barrio',
        'celular',
        'cargo',
        'area',
        'tipo_contrato',
        'eps',
        'afp',
        'arl',
        'cesantias',
        'caja_compensacion',
        'nombre_familiar_1',
        'parentesco_1',
        'telefono_familiar_1',
        'nombre_familiar_2',
        'parentesco_2',
        'telefono_familiar_2',
        'observaciones',
        
    ], [
        'nombres.required' => 'El nombre es obligatorio.',
        'apellidos.required' => 'El apellido es obligatorio.',
        'cedula.required' => 'La cédula es obligatoria.',
        'cedula.unique' => 'Ya existe otro empleado con esta cédula.',
    ])->validate();

 
        $empleado->fill($request->only($empleado->getFillable()));
        $empleado->save();

        return redirect()->route('employees.index')->with('success', 'Empleado actualizado correctamente.');
    } catch (\Exception $e) {
        return back()->with('error', 'Error al actualizar el empleado: ' . $e->getMessage());
    }
}


public function delete($id){

    try {
        $empleado = empleado::find($id);

        if (empty($empleado)){
            Session::flash('message', ['content' => "El Empleado con id '$id' no existe", 'type' => 'error']);
        }
        
        $empleado->delete();
            Session::flash('message', ['content' => "Empleado Eliminado con Exito", 'type' => 'success']);
            return redirect()->action([EmpleadoController::class, 'index']);
        
    } catch (\Throwable $th) {
        Log::error($ex);
        Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
        return redirect()->back();
    }
}

    // public function showImportForm()
    // {
    //     return view('employee.import');
    // }

    // public function import(Request $request)
    // {
    //     $archivo = $request->file('archivo');

    //     if (!$archivo) {
    //         return back()->with('error', 'No se proporcionó archivo.');
    //     }

    //     try {
    //         // Leer el archivo con encabezados reales
    //         $data = Excel::toCollection(null, $archivo)->first()->toArray();

    //         foreach ($data as $index => $row) {
    //             if ($index === 0 || empty($row['Cédula'])) continue;

    //             try {
    //                 Empleado::create([
    //                    'numero_empleado'          => $row['numero_empleado'] ?? null,
    //                    'codigo_interno'           => $row['codigo_interno'] ?? null,
    //                    'fecha_ingreso'            => self::formatDate($row['fecha_ingreso'] ?? null),
    //                                            'nivel_riesgo'             => $row['nivel_riesgo'] ?? null,
    //                    'lugar_trabajo'            => $row['lugar_trabajo'] ?? null,
    //                    'sexo'                     => $row['sexo'] ?? null,
    //                    'nombres'                  => $row['nombres'] ?? null,  // Will be validated as required|string|max:100
    //                    'apellidos'                => $row['apellidos'] ?? null,  // Will be validated as required|string|max:100
    //                    'cedula'                   => str_replace([',', '.'], '', $row['cedula'] ?? null),  // Will be validated as required|numeric|unique
    //                    'lugar_nacimiento'         => $row['lugar_nacimiento'] ?? null,
    //                    'lugar_expedicion'         => $row['lugar_expedicion'] ?? null,
    //                    'fecha_nacimiento'         => self::formatDate($row['fecha_nacimiento'] ?? null),
    //                    'rh'                       => $row['rh'] ?? null,  // New field
    //                    'edad'                     => is_numeric($row['edad']) ? intval($row['edad']) : null,
    //                    'correo'                   => $row['correo'] ?? null,  // Will be validated as nullable|email|max:100
    //                    'correo_corporativo'       => $row['correo_corporativo'] ?? null,  // New field, will be validated as nullable|email|max:100
    //                    'direccion'                => $row['direccion'] ?? null,  // Will be validated as nullable|string|max:255
    //                    'barrio'                   => $row['barrio'] ?? null,  // New field
    //                    'celular'                  => $row['celular'] ?? null,  // Will be validated as nullable|string|max:20
    //                    'cargo'                    => $row['cargo'] ?? null,  // New field
    //                    'area'                     => $row['area'] ?? null,  // New field
    //                    'tipo_contrato'            => $row['tipo_contrato'] ?? null,
    //                    'eps'                      => $row['eps'] ?? null,
    //                    'afp'                      => $row['afp'] ?? null,
    //                    'arl'                      => $row['arl'] ?? null,
    //                    'cesantias'                => $row['cesantias'] ?? null,
    //                    'caja_compensacion'        => $row['caja_compensacion'] ?? null,
    //                    'nombre_familiar_1'        => $row['nombre_familiar_1'] ?? null,
    //                    'parentesco_1'             => $row['parentesco_1'] ?? null,
    //                    'telefono_familiar_1'      => $row['telefono_familiar_1'] ?? null,
    //                    'nombre_familiar_2'        => $row['nombre_familiar_2'] ?? null,
    //                    'parentesco_2'             => $row['parentesco_2'] ?? null,
    //                    'telefono_familiar_2'      => $row['telefono_familiar_2'] ?? null,
    //                    'observaciones'            => $row['observaciones'] ?? null,

    //                 ]);
    //             } catch (\Exception $e) {
    //                 Log::error("Error en fila $index: " . $e->getMessage());
    //                 continue;
    //             }
    //         }

    //         Session::flash('message', ['content' => 'Empleados importados correctamente', 'type' => 'success']);
    //         return redirect()->action([EmpleadoController::class, 'index']);

    //     } catch (\Exception $ex) {
    //         Log::error('Error al importar archivo: ' . $ex->getMessage());
    //         Session::flash('message', ['content' => 'Ocurrió un error al importar el archivo.', 'type' => 'error']);
    //         return redirect()->back();
    //     }
    // }

//     private static function formatDate($value)
//     {
//         try {
//             return Carbon::parse($value)->format('Y-m-d');
//         } catch (\Exception $e) {
//             Log::warning("Fecha inválida: " . $value);
//             return null;
//         }
//     }
// }

// public function import(Request $request)
// {
//     $request->validate([
//         'excel_file' => 'required|file|mimes:xlsx,xls,csv|max:5120'
//     ]);

//     try {
//         $archivo = $request->file('excel_file');

//         // Leemos todas las filas como colección
//         $coleccion = Excel::toCollection(null, $archivo)->first();

//         if ($coleccion->isEmpty()) {
//             return back()->with('error', 'El archivo está vacío.');
//         }

//         // Encabezados en minúsculas y sin espacios
//         $encabezados = array_map(function ($col) {
//             return trim(strtolower($col));
//         }, $coleccion->shift()->toArray()); // Primera fila = encabezados

//         $procesados = 0;
//         $errores = [];

//         foreach ($coleccion as $index => $fila) {
//             $filaAsociativa = array_combine($encabezados, $fila->toArray());

//             if (empty($filaAsociativa['cedula'])) {
//                 $errores[] = "Fila " . ($index + 2) . ": Cédula vacía";
//                 continue;
//             }

//             try {
//                 // Limpiar datos
//                 $datosEmpleado = collect($filaAsociativa)
//                     ->only((new Empleado())->getFillable()) // Solo columnas del modelo
//                     ->map(function ($valor, $clave) {
//                         if (stripos($clave, 'fecha') !== false && !empty($valor)) {
//                             return $this->parseExcelDate($valor);
//                         }
//                         return $valor;
//                     })
//                     ->toArray();

//                 // Quitar símbolos no numéricos en cédula
//                 $datosEmpleado['cedula'] = preg_replace('/[^0-9]/', '', $datosEmpleado['cedula']);

//                 Empleado::updateOrCreate(
//                     ['cedula' => $datosEmpleado['cedula']],
//                     $datosEmpleado
//                 );

//                 $procesados++;
//             } catch (\Exception $e) {
//                 $errores[] = "Fila " . ($index + 2) . ": " . $e->getMessage();
//             }
//         }

//         $mensaje = "Importación completada: $procesados registros.";
//         if ($errores) {
//             $mensaje .= " Errores: " . count($errores);
//             session()->flash('import_errors', $errores);
//         }

//         return redirect()->route('employees.index')->with('success', $mensaje);

//     } catch (\Exception $e) {
//         return back()->with('error', 'Error al importar: ' . $e->getMessage());
//     }
// }

// private function parseExcelDate($valor)
// {
//     try {
//         if (is_numeric($valor)) {
//             return \Carbon\Carbon::instance(
//                 \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($valor)
//             )->format('Y-m-d');
//         }
//         return \Carbon\Carbon::parse($valor)->format('Y-m-d');
//     } catch (\Exception $e) {
//         return null;
//     }
// }




public function import(Request $request)
{
    $request->validate([
        'excel_file' => 'required|file|mimes:xlsx,xls|max:5120'
    ]);

    try {
        Excel::import(new EmpleadosImport, $request->file('excel_file'));
        return redirect()->route('employees.index')->with('success', 'Importación completada correctamente.');
    } catch (\Exception $e) {
        return back()->with('error', 'Error al importar: ' . $e->getMessage());
    }
}





}