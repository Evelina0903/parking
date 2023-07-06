<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            'fio'=>'Клиент2',
            'gender'=>'0',
            'number'=>'1111111',
            'addres'=>'jjkjkjkv',
        ]);
        DB::table('clients')->insert([
            'fio'=>'Клиент2',
            'gender'=>'1',
            'number'=>'222',
            'addres'=>'dvdd',
        ]);
        DB::table('clients')->insert([
            'fio'=>'Клиент3',
            'gender'=>'0',
            'number'=>'33333',
            'addres'=>'dsssg',
        ]);
    }
}
