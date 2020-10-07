<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Model\Employee\Organization;
use App\Model\Employee\Lab;
use App\Model\Employee\Equipment;
use App\Model\Employee\ProductLab;
use App\Model\BasicInformations\Role;
use App\Model\BasicInformations\Region;

use App\Model\Logs\logCommentLab;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_code','name', 'email', 'password', 'role_id', 'agency_id', 'region_id', 'status'
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

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }

    public function labs()
    {
        return $this->hasMany(Lab::class);
    }

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

    public function productLabs()
    {
        return $this->hasMany(ProductLab::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function region() {
        return $this->belongsTo(Region::class);
    }

    public function logCommentLabs()
    {
        return $this->hasMany(LogCommentLab::class);
    }
}
