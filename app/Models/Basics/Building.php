<?php

namespace App\Models\Basics;

use Illuminate\Database\Eloquent\Model;

use App\Models\Location;

class Building extends Model
{
    protected $table = 'buildings';
    protected $primaryKey = 'id';
    protected $fillable = ['building_name', 'building_status', 'created_by', 'updated_by'];

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
}
