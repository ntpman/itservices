<?php

namespace App\Models\Assets;

use Illuminate\Database\Eloquent\Model;

use App\Models\Assets\Asset;

class AssetRepair extends Model
{
    protected $table = 'asset_repairs';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [
        'asset_id', 'asset_repair_date', 'asset_repair_list', 'asset_repair_name', 'asset_repair_org', 'asset_repair_comment', 
        'created_by', 'updated_by'
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
