<?php

namespace App\Models\Basics;

use Illuminate\Database\Eloquent\Model;

use App\Models\Assets\Asset;
use App\Models\Basics\Brand;

class BrandModel extends Model
{
    protected $table = 'brand_models';
    protected $primaryKey = 'id';
    protected $fillable = ['brand_id', 'brand_model_name', 'brand_model_status', 'created_by', 'updated_by'];

    public $timestamps = true;

    /**
     * Eloquent: Relationships
     */
    // belongsTo
    public function brand() 
    {
        return $this->belongsTo(Brand::class);
    }

    // hasMany
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }  
}
