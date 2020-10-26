<?php

namespace App\Model\Basic;

use Illuminate\Database\Eloquent\Model;

use App\Model\Assets\Asset;
use App\Model\Basic\Brand;

class AssetModel extends Model
{
    protected $table = 'models';
    protected $primaryKey = 'id';
    protected $fillable = ['brand_id','model_name','model_status','created_by','updated_by'];

    public $timestamps = true;

    /**
     * Eloquent: Relationships
     */

    // hasMany
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }

    // belongsTo
    public function brand() 
    {
        return $this->belongsTo(Brand::class);
    }
}
