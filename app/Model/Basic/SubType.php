<?php

namespace App\Model\Basic;

use Illuminate\Database\Eloquent\Model;

use App\Model\Assets\Asset;
use App\Model\Basic\Type;

class SubType extends Model
{
    protected $table = 'asset_subtypes';
    protected $primaryKey = 'id';
    protected $fillable = ['asset_type_id','subtype_name','subtype_status','created_by','updated_by',];

    public $timestapms = true;

    /**
     * Eloquent: Relationships
     */

    // belongsTo
    public function assetType() {
        return $this->belongsTo(Type::class);
    }

    // hasMany
    public function assets() {
        return $this->hasMany(Asset::class);
    }
}
