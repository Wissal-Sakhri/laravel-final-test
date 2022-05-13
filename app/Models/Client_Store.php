<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_Store extends Model
{
    use HasFactory;
    protected $primaryKey = 'client_store_id';
    protected $fillable = [
        'product_count_client_store',
        'attribute_info_product',
        'client_id',
        'store_id'
   ];
}
