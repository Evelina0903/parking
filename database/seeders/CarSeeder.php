<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([
            'brand'=>'Марка1',
            'model'=>'Модель1',
            'color'=>'Цвет1',
            'rf_number'=>'ff11',
            'parking'=>'0',
            'id_client'=>1,
        ]);

        DB::table('cars')->insert([
            'brand'=>'Марка2',
            'model'=>'Модель2',
            'color'=>'Цвет2',
            'rf_number'=>'ff22',
            'parking'=>'1',
            'id_client'=>2,
        ]);

        DB::table('cars')->insert([
            'brand'=>'Марка3',
            'model'=>'Модель3',
            'color'=>'Цвет3',
            'rf_number'=>'ff33',
            'parking'=>'0',
            'id_client'=>3,
        ]);
    }
}
