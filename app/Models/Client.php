<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    use HasFactory;

    public static function create($params)
    {
        $id = DB::table('clients')->insertGetId([
            'fio'=>$params['fio'],
            'gender'=>$params['gender'],
            'number'=>$params['number'],
            'addres'=>$params['addres'],
        ]);
        return $id;
    }

    public static function updateById($params)
    {
        DB::table('clients')
            ->where('id', $params['clientId'])
            ->update([
                'fio'=>$params['fio'],
                'gender'=>$params['gender'],
                'number'=>$params['number'],
                'addres'=>$params['addres'],
            ]);
    }

    public static function getAll()
    {
        $clients = DB::table('clients')->get();
        return $clients;
    }

    public static function getById($id)
    {
        return DB::table('clients')->where('id', $id)->first();
    }
    public static function getCountCars($id)
    {
        return DB::table('clients')->select(DB::raw('COUNT(cars.id) as carCount'))->join('cars', 'clients.id', '=', 'cars.id_client')
            ->where('clients.id', $id)->first();
    }
    public static function deleteById($id)
    {
        return DB::table('clients')->where('id','=', (integer)$id)->delete();
    }
}
