<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_Item extends Model
{
    use HasFactory;
    protected $primaryKey = 'cart_items_id';
    protected $fillable = [
        'client_id',
        'client_store_id'
    ];
}
