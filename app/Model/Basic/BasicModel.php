<?php

namespace App\Model\Basic;

use Illuminate\Database\Eloquent\Model;

use App\Model\Assets\Asset;
use App\Model\Basic\Brand;

class BasicModel extends Model
{
    protected $table = 'basic_models';
    protected $primaryKey = 'id';
    protected $fillable = ['brand_id', 'basic_model_name', 'basic_model_status', 'created_by', 'updated_by'];

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
