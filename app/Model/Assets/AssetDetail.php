<?php

namespace App\Model\Assets;

use Illuminate\Database\Eloquent\Model;

use App\Model\Assets\Asset;

class AssetDetail extends Model
{
    protected $table = 'asset_details';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [
        'asset_id', 'asset_detail', 'amont', 'comment', 'created_by', 'updated_by'
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
