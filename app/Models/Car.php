<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    use HasFactory;

    public static function create($params)
    {
        DB::table('cars')->insert([
            'brand'=>$params['brand'],
            'model'=>$params['model'],
            'color'=>$params['color'],
            'rf_number'=>$params['rf_number'],
            'parking'=>$params['parking'],
            'id_client'=>$params['id_client'],
        ]);
    }

    public static function createByParametrAndClientId($params, $client_id){
        DB::table('cars')->insert([
            'brand'=>$params['brand'],
            'model'=>$params['model'],
            'color'=>$params['color'],
            'rf_number'=>$params['rf_number'],
            'parking'=>$params['parking'],
            'id_client'=>$client_id,
        ]);
    }
    public static function updateById($params)
    {
        DB::table('cars')
            ->where('id', $params['carId'])
            ->update([
            'brand'=>$params['brand'],
            'model'=>$params['model'],
            'color'=>$params['color'],
            'rf_number'=>$params['rf_number'],
            'parking'=>$params['parking'],
        ]);
    }

    public static function updateParkingById($validatedData)
    {
        DB::table('cars')
            ->where('id', $validatedData['carId'])
            ->update([
                'parking'=>$validatedData['parking'],
            ]);
    }
    public static function getAll()
    {
        $cars = DB::table('cars')->get();

        return $cars;
    }

    public static function getAllWithClients()
    {
        return DB::table('cars')->select('*', 'cars.id as car_id')->join('clients', 'cars.id_client', '=', 'clients.id')->get();

    }


    public static function getAllWithClientsLimit($page)

    {
        return DB::table('cars')->select('*', 'cars.id as car_id')->join('clients', 'cars.id_client', '=', 'clients.id')->skip(($page-1)*5)->take(5)->get();

    }

    public static function getCountPage($row)
    {
        return ceil(DB::table('cars')->count('id')/$row);
    }
    public static function allCarById($id)
    {
        return DB::table('cars')->select('*')->where('id_client', $id)->get();
    }

    public static function getById($id)
    {
        return DB::table('cars')->where('id','=', (integer)$id)->first();
    }

    public static function deleteById($id)
    {
        return DB::table('cars')->where('id','=', (integer)$id)->delete();
    }

    public static function getByRfNumber($rf_number)
    {
        return DB::table('cars')->where('rf_number', '=', $rf_number)->first();
    }

}
