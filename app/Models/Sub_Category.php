<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    use HasFactory;
    protected $primaryKey = 'sub_categoty_id';
    protected $fillable = [
        'name_subcategory',
        'thumbnail_subcategory',
        'status_subcategory',
        'store_id',
        'category_id'
    ];

}
