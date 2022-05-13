<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $primaryKey = 'cart_id';
    protected $fillable = [
        'tax_cart',
        'coupon_code_cart',
        'coupon_type_cart',
        'discount_cart',
        'payement_amount_cart',
        'currency_cart',
        'delivery_note_cart',
        'store_pickup_cart',
        'pickup_point_details_cart',
        'status_cart',
        'admin_notes_cart',
        'cart_items_id',
        'client_id',
        'store_id'
    ];
}
