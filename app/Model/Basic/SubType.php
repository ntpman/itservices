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

<<<<<<< HEAD
    public function assetType() {
=======
    /**
     * Eloquent: Relationships
     */
    // belongsTo
    public function type() {
>>>>>>> e8275cf437606d269707a3316971e8f6226ef0b2
        return $this->belongsTo(Type::class);
    }

    // hasMany
    public function assets() {
        return $this->hasMany(Asset::class);
    }
}
