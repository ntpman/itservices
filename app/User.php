<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Profile;
use App\Models\Assets\Asset;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'role', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Eloquent: Relationships
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }

    public function requestAssigns()
    {
        return $this->hasMany(RequestAssign::class,'user_id','id');
    }

    public function requestInfos()
    {
        return $this->hasMany(RequestInfo::class,'user_id','id');
    }

    public function books()
    {
        return $this->hasMany(Books::class,'user_id','id');
    }
}
