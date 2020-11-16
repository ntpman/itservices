<?php

namespace App\Models\Assets;

use Illuminate\Database\Eloquent\Model;

use App\Models\Assets\Asset;

class AssetPicture extends Model
{
    protected $table = 'asset_pictures';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [
        'asset_id', 'asset_picture_name', 'created_by', 'updated_by'
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
