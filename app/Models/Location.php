<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Assets\Asset;
use App\Models\Basics\Building;

class Location extends Model
{
    protected $table = 'locations';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [
        'asset_id', 'building_id', 'location_floor', 'location_room', 'created_by', 'updated_by'
    ];
    */
    
    protected $guarded = [];

    public $timestamps = true;

    /**
     * Eloquent: Relationships
     */
    // belongsTo
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    // hasMany
}
