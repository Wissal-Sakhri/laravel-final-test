<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'name_porduct',
        'description_product',
        'original_price_product',
        'sell_price_product',
        'taxable_product',
        'stock_item_product',
        'stock_prevent_purchase_product',
        'attribute_ids_product',
        'preparation_time_product',
        'purchase_note_product',
        'thumbnail_product',
        'featured_images_product',
        'sales_count_product',
        'visit_count_product',
        'status_product',
        'store_id',
        'category_id',
        'sub_category_id',
        'store_id',

   ];
   protected $table ='ecommerce_products';
}
