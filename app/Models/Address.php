<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable=[
        'country_address',
        'city_address',
        "state_address",
        'street_address',
        'zip_address',
        'longitude_address',
        'latitude_address',
        'client_id',
        'store_id'
    ];
    protected $primaryKey='id_address';
}
