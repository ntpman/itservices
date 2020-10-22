<?php

namespace App\Model\Basic;

use Illuminate\Database\Eloquent\Model;

class building extends Model
{
    protected $table = 'buildings';
    protected $primaryKey = 'id';
    protected $fillable = ['building_name','building_status','created_by','updated_by'];

    public $timestamps = true;
}
