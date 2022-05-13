<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $primaryKey = 'comment_id';
    protected $fillable = [
        'parent_id_comment',
        'content_comment',
        'status_comment',
        'product_id',
        'client_id'
    ];
}
