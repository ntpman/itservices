<?php

namespace App\Models\Assets;

use Illuminate\Database\Eloquent\Model;

use App\Models\Assets\Asset;

class AssetDetail extends Model
{
    protected $table = 'asset_details';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [
        'asset_id', 'asset_detail_description', 'asset_detail_amont', 'asset_detail_comment', 'created_by', 'updated_by'
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
