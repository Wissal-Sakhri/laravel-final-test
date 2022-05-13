<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;
    protected $primaryKey = 'suggestion_id';
    protected $fillable = [
        'product_id',
        'store_id'
    ];
}
