<?php

namespace App\Models\Basics;

use Illuminate\Database\Eloquent\Model;

use App\Models\Assets\Asset;
use App\Models\Basics\Type;

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
    public function type() {
        return $this->belongsTo(Type::class);
    }

    // hasMany
    public function assets() {
        return $this->hasMany(Asset::class);
    }
}
