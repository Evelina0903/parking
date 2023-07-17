<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'Имя1',
            'fio'=>'Фамилия1',
            'consent_to_mailing'=>'1',
        ]);
        DB::table('users')->insert([
            'name'=>'Имя2',
            'fio'=>'Фамилия2',
            'consent_to_mailing'=>'0',
        ]);
        DB::table('users')->insert([
            'name'=>'Имя3',
            'fio'=>'Фамилия3',
            'consent_to_mailing'=>'1',
        ]);
    }
}
