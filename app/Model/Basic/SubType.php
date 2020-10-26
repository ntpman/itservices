<?php

namespace App\Model\Basic;

use Illuminate\Database\Eloquent\Model;

use App\Model\Assets\Asset;
use App\Model\Basic\Type;

class Subtype extends Model
{
    protected $table = 'subtypes';
    protected $primaryKey = 'id';
    protected $fillable = ['type_id','subtype_name','subtype_status','created_by','updated_by',];

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
