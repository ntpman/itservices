<?php

namespace App\Model\Basic;

use Illuminate\Database\Eloquent\Model;

class CommonName extends Model
{
    protected $table = 'asset_common_names';
    protected $primaryKey = 'id';
    protected $fillable = ['common_name','common_name_status','created_by','updated_by']; 

    public $timestaps = true;
}
