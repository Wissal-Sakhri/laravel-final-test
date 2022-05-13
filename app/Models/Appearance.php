<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appearance extends Model
{
    use HasFactory;
    protected $primaryKey='appearance_id';
    
    protected $fillable = [
        'product_sort_appearance',
        'product_listing_appearance',
        'theme_color_appearance',
        'hide_add_to_cart_appearance',
        'hide_buy_now_appearance',
        'store_id',
   ];

}
