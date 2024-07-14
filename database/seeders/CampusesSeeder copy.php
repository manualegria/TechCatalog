<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampusesesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $campus = [
            ['name' => 'Medellin', 'is_hidden' => false],
            ['name' => 'Cali', 'is_hidden' => false],
            ['name' => 'Bogota', 'is_hidden' => true],
        ];

        DB::table('cities')->insert($city);
    }
}