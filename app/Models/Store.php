<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $primaryKey = 'store_id';
    protected $fillable = [
        'name_store',
        'logo_store',
        'favicon_store',
        'email_store',
        'phone_store',
        'country_store',
        'city_store',
        'state_store',
        'zip_store',
        'street_store',
        'currency_store',
        'tax_percentage_store',
        'term_use_link_store',
        'policy_link_store',
        'qr_code_store',
        'status_store',
        'admin_id'

   ];
   public $timestamps =true;
   protected $table='ecommerce_stores';
}
