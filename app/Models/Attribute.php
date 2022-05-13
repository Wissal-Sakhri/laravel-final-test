<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $primaryKey = 'attribute_id';
    protected $fillable = [
        'name_attribute',
        'values_attribute',
        'optional_attribute',
        'multiselect_attribute',
        'status_attribute',
        'store_id',
        'admin_id'
    ];
}
