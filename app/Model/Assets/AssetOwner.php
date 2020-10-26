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
        'asset_id', 'owner_name', 'owner_started', 'owner_ended', 'created_by', 'updated_by'
    ];
    */
    
    protected $guarded = [];

    public $timestamps = true;

    /**
     * Eloquent: Relationships
     */
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
