<?php

namespace App\Model\Assets;

use Illuminate\Database\Eloquent\Model;

use App\Model\Assets\Asset;

class AssetRepair extends Model
{
    protected $table = 'asset_repairs';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [
        'asset_id', 'repair_date', 'repair_list', 'repairer_name', 'repairer_org', 'repair_comment', 'created_by', 'updated_by'
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
