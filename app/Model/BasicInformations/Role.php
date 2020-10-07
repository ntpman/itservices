<?php

namespace App\Model\BasicInformations;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $fillable = ['role_name','role_status',];

    public $timestamps = true;

    public function users() {
        return $this->hasMany(User::class);
    }
}
