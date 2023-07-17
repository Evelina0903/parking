<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('delivery_addresses')->insert([
            'region'=>'Регион1',
            'locality'=>'Населенный пункт1',
            'street'=>'Улица 1',
            'house'=>'Дом 1',
            'postcode'=>'1',
            'users_id'=>'1',
        ]);
        DB::table('delivery_addresses')->insert([
            'region'=>'Регион2',
            'locality'=>'Населенный пункт2',
            'street'=>'Улица 2',
            'house'=>'Дом 2',
            'postcode'=>'2',
            'users_id'=>'2',
        ]);
        DB::table('delivery_addresses')->insert([
            'region'=>'Регион3',
            'locality'=>'Населенный пункт3',
            'street'=>'Улица 3',
            'house'=>'Дом 3',
            'postcode'=>'3',
            'users_id'=>'3',
        ]);
        DB::table('delivery_addresses')->insert([
            'region'=>'Регион4',
            'locality'=>'Населенный пункт4',
            'street'=>'Улица 4',
            'house'=>'Дом 4',
            'postcode'=>'4',
            'users_id'=>'1',
        ]);
        DB::table('delivery_addresses')->insert([
            'region'=>'Регион5',
            'locality'=>'Населенный пункт5',
            'street'=>'Улица 5',
            'house'=>'Дом 5',
            'postcode'=>'5',
            'users_id'=>'2',
        ]);
    }
}
