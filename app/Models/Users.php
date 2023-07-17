<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = array('name', 'fio','consent_to_mailing');



    public function address()
    {
        return $this->hasMany(DeliveryAddresses::class,);
    }


}
