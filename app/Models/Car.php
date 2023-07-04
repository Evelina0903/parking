<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    use HasFactory;
    
    public static function getAll()
    {
        $cars = DB::table('cars')->get();
        
        return $cars;
    }

    public static function getAllWithClients()
    {
        return DB::table('cars')->join('clients', 'cars.id_client', '=', 'clients.id')->get();
    }
}
