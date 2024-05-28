<?php

namespace Database\Seeders;


use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
  /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [

            // Ciudades
            ["name" => "showCities", "description" => "Ver Ciudades", "module" => "Cities"],
            ["name" => "creteCities", "description" => "Crear Ciudades", "module" => "Cities"],
            ["name" => "updateCities", "description" => "Editar Ciudades", "module" => "Cities"],
            ["name" => "deleteCpmanies", "description" => "Eliminar Ciudades", "module" => "Cities"],

        // Sedes
            ["name" => "showCampuses", "description" => "Ver Sedes", "module" => "Campuses"],
            ["name" => "creteCampuses", "description" => "Crear Sedes", "module" => "Campuses"],
            ["name" => "updateCampuses", "description" => "Editar Sedes", "module" => "Campuses"],
            ["name" => "deleteCampuses", "description" => "Eliminar Sedes", "module" => "Campuses"],

        //     // Roles
            ["name" => "showRoles", "description" => "Ver Roles", "module" => "Roles"],
            ["name" => "createRoles", "description" => "Crear Roles", "module" => "Roles"],
            ["name" => "updateRoles", "description" => "Editar Roles", "module" => "Roles"],
            ["name" => "deleteRoles", "description" => "Eliminar Roles", "module" => "Roles"],

         //   Usuarios
            ["name" => "showUsers", "description" => "Ver Usuarios", "module" => "Users"],
            ["name" => "createUsers", "description" => "Crear Usuarios", "module" => "Users"],
            ["name" => "updateUsers", "description" => "Editar Usuarios", "module" => "Users"],
            ["name" => "deleteUsers", "description" => "Eliminar Usuarios", "module" => "Users"],
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
