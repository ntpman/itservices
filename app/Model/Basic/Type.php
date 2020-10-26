<?php

namespace App\Model\Basic;

use Illuminate\Database\Eloquent\Model;

use App\Model\Assets\Asset;
use App\Model\Basic\SubType;

class Type extends Model
{
    protected $table = 'asset_types';
    protected $primaryKey = 'id';
    protected $fillable = ['asset_type_name','asset_type_status','created_by','updated_by'];

    public $timestamps = true;

    /**
     * Eloquent: Relationships
     */

    // hasMany
    public function assets() {
        return $this->hasMany(Asset::class);
    }
    public function subTypes() {
        return $this->hasMany(SubType::class);
    }
    
}
