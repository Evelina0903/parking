<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    use HasFactory;
    
    public static function getAll()
    {
        $clients = DB::table('clients')->get();
        return $clients;
    }


}
