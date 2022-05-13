<?php

namespace App\Models;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends  Authenticatable  implements JWTSubject
{
    use HasRoles, HasApiTokens, HasFactory,Notifiable;
        protected  $fillable = [
        'name_admin',
        'email_admin',
        'phone_admin',
        'password_admin',
        'address_admin',
        'status_admin'
    ];
    protected  $primaryKey ='admin_id';
    protected $table = 'ecommerce_admins';
    public $timestamps=true;
    protected $guard='admin-api';
        /**

     * The attributes that should be hidden for arrays.

     *

     * @var array

     */

    protected $hidden = [

        'password_admin',

        'remember_token',

    ];

    /*public function role()
    {
        return $this->belongsTo('App\Role');
    }


    public function hasRole()
    {
        return optional($this->role)->name;
    }

  */

    /**

     * The attributes that should be cast to native types.

     *

     * @var array

     */

    protected $casts = [

        'email_verified_at' => 'datetime',

    ];

        /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function getAuthPassword()
    {
    return $this->password_admin;
    }
    
}

