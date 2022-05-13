<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $primaryKey = 'client_id';
    protected $fillable = [
        'first_name_client',
        'last_name_client',
        'email_client',
        'password_client',
        'subscribe_id',
        'store_id'

   ];
}
