<?php

namespace App\Model\Basic;

use Illuminate\Database\Eloquent\Model;

use App\Model\Assets\Asset;
use App\Model\Basic\BrandModel;

class Brand extends Model
{
    protected $table = 'brands';
    protected $primaryKey = 'id';
    protected $fillable = ['brand_full_name', 'brand_abbr_name', 'brand_status', 'created_by', 'updated_by'];

    public $timestamps = true;

    /**
     * Eloquent: Relationships
     */
    // belongsTo

    // hasMany
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
    public function brandModels() 
    {
        return $this->hasMany(BrandModel::class);
    }

}
