<?php

namespace App\Model\Basic;

use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    protected $table = 'asset_usages';
    protected $primaryKey = 'id';
    protected $fillable = ['usage_name','usage_status','created_by','updated_by',];

    public $timestamps = true;
}
