<?php

namespace App\Models\Basics;

use Illuminate\Database\Eloquent\Model;

use App\Models\Location;

class Building extends Model
{
    protected $table = 'buildings';
    protected $primaryKey = 'id';
    
    protected $guarded = [];

    public $timestamps = true;

    /**
     * Eloquent: Relationships
     */
    // belongsTo

    // hasMany
    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function requestInfos()
    {
        return $this->hasMany(RequestInfo::class, 'building_id', 'id');
    }

}
