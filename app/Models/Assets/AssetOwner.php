<?php

namespace App\Model\Assets;

use Illuminate\Database\Eloquent\Model;

use App\Model\Assets\Asset;

class AssetOwner extends Model
{
    protected $table = 'asset_owners';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [
        'asset_id', 'asset_owner_name', 'asset_owner_started', 'asset_owner_ended', 'created_by', 'updated_by'
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

    // hasMany
}
