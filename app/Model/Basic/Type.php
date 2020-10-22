<?php

namespace App\Model\Basic;

use Illuminate\Database\Eloquent\Model;

use App\Model\Basic\SubType;

class Type extends Model
{
    protected $table = 'asset_types';
    protected $primaryKey = 'id';
    protected $fillable = ['asset_type_name','asset_type_status','created_by','updated_by'];

    public $timestamps = true;

    public function assetSubtypes() {
        return $this->hasMany(SubType::class);
    }
}
