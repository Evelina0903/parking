<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddresses extends Model
{
    use HasFactory;

    protected $fillable = array('region', 'locality', 'street', 'house', 'postcode', 'users_id');
}
