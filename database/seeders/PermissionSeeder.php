<?php

namespace Database\Seeders;


use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
  /**
     * Run the database seeds.
     */
    public function run(): void    {
        $list = [

            // Ciudades
            ["name" => "showCities", "description" => "Ver Ciudades", "module" => "Ciudades"],
            ["name" => "creteCities", "description" => "Crear Ciudades", "module" => "Ciudades"],
            ["name" => "updateCities", "description" => "Editar Ciudades", "module" => "Ciudades"],
            ["name" => "deleteCpmanies", "description" => "Eliminar Ciudades", "module" => "Ciudades"],

        // Sedes
            ["name" => "showCampuses", "description" => "Ver Sedes", "module" => "Sedes"],
            ["name" => "creteCampuses", "description" => "Crear Sedes", "module" => "Sedes"],
            ["name" => "updateCampuses", "description" => "Editar Sedes", "module" => "Sedes"],
            ["name" => "deleteCampuses", "description" => "Eliminar Sedes", "module" => "Sedes"],

        //   Roles
            ["name" => "showRoles", "description" => "Ver Roles", "module" => "Roles"],
            ["name" => "createRoles", "description" => "Crear Roles", "module" => "Roles"],
            ["name" => "updateRoles", "description" => "Editar Roles", "module" => "Roles"],
            ["name" => "deleteRoles", "description" => "Eliminar Roles", "module" => "Roles"],

         //   Usuarios
            ["name" => "showUsers", "description" => "Ver Usuarios", "module" => "Usuarios"],
            ["name" => "createUsers", "description" => "Crear Usuarios", "module" => "Usuarios"],
            ["name" => "updateUsers", "description" => "Editar Usuarios", "module" => "Usuarios"],
            ["name" => "deleteUsers", "description" => "Eliminar Usuarios", "module" => "Usuarios"],

         // Equipos
            ["name" => "showEquipos", "description" => "Ver Equipos", "module" => "Equipos"],
            ["name" => "createEquipos", "description" => "Crear Equipos", "module" => "Equipos"],
            ["name" => "updateEquipos", "description" => "Editar Equipos", "module" => "Equipos"],
            ["name" => "deleteEquipos", "description" => "Eliminar Equipos", "module" => "Equipos"],       

         // Areas
            ["name" => "showAreas", "description" => "Ver Areas", "module" => "Areas"],
            ["name" => "createAreas", "description" => "Crear Areas", "module" => "Areas"],
            ["name" => "updateAreas", "description" => "Editar Areas", "module" => "Areas"],
            ["name" => "deleteAreas", "description" => "Eliminar Areas", "module" => "Areas"],

         // Empresas
            ["name" => "showCompanies", "description" => "Ver Empresas", "module" => "Empresas"],
            ["name" => "createCompanies", "description" => "Crear Empresas", "module" => "Empresas"],
            ["name" => "updateCompanies", "description" => "Editar Empresas", "module" => "Empresas"],
            ["name" => "deleteCompanies", "description" => "Eliminar Empresas", "module" => "Empresas"],
            
                     // Empleados
                     ["name" => "showEmployees", "description" => "Ver Emplados", "module" => "Empleados"],
                     ["name" => "createEmpoloyees", "description" => "Crear Emplados", "module" => "Empleados"],
                     ["name" => "updateEmpoloyees", "description" => "Editar Emplados", "module" => "Empleados"],
                     ["name" => "deleteEmpoloyees", "description" => "Eliminar Emplados", "module" => "Empleados"],
                     
         ];

        foreach($list as $item) {

            $permission = Permission::where('name', '=', $item['name'])
                                    ->where('module', '=', $item['module'])
                                    ->first();

            if (empty($permission)) {

                $newPermission = new Permission();
                $newPermission->name = $item['name'];
                $newPermission->description = $item['description'];
                $newPermission->module = $item['module'];
                $newPermission->save();
            }
        }
    }
}
