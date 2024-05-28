<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        $adminRole = new Role();
        $adminRole->name = "Administrador";
        $adminRole->save();

        // cities role
        $citiesPermissions = Permission::where('module', '=', 'cities')
                                      ->get();

        $citiesRole = new Role();
        $citiesRole->name = "Editor de Ciudades";
        $citiesRole->save();

        foreach($citiesPermissions as $permission) {

            $rolePermission = new RolePermission();
            $rolePermission->role_id = $citiesRole->id;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }

        // // campus role
        $campusesPermissions = Permission::where('module', '=', 'campuses')
                                          ->get();
        $campusesRole = new Role();
        $campusesRole->name = "Editor de Sedes";
        $campusesRole->save();

        foreach($campusesPermissions as $permission) {

            $rolePermission = new RolePermission();
            $rolePermission->role_id = $campusesRole->id;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }

        // Content manager role
         $editorPermissions = $citiesPermissions->merge($campusesPermissions);

        $editorRole = new Role();
        $editorRole->name = "Editor de contenido";
        $editorRole->save();

        foreach($editorPermissions as $permission) {

            $rolePermission = new RolePermission();
            $rolePermission->role_id = $editorRole->id;
            $rolePermission->permission_id = $permission->id;
            $rolePermission->save();
        }

       // Users

        $user = new User();
        $user->first_name = "Emir";
        $user->last_name = "Alegria";
        $user->document = "11111";
        $user->email = "emir@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $adminRole->id;
        $user->save();

        $user = new User();
        $user->first_name = "John";
        $user->last_name = "Doe";
        $user->email = "jhond@yopmail.com";
        $user->document = "222222";
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $editorRole->id;
        $user->save();

        $user = new User();
        $user->first_name = "Ana";
        $user->last_name = "Doe";
        $user->document = "33333";
        $user->email = "anad@yopmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('1234');
        $user->role_id = $campusesRole->id;
        $user->save();
    }
}