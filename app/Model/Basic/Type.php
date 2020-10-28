<?php

namespace App\Model\Basic;

use Illuminate\Database\Eloquent\Model;

use App\Model\Assets\Asset;
use App\Model\Basic\Subtype;

class Type extends Model
{
    protected $table = 'types';
    protected $primaryKey = 'id';
    protected $fillable = ['type_name', 'type_status', 'created_by', 'updated_by'];

    public $timestamps = true;

<<<<<<< HEAD
    public function assetSubtypes() {
        return $this->hasMany(SubType::class);
=======
    /**
     * Eloquent: Relationships
     */
    // belongsTo

    // hasMany
    public function assets() {
        return $this->hasMany(Asset::class);
    }
    public function subtypes() {
        return $this->hasMany(Subtype::class);
>>>>>>> e8275cf437606d269707a3316971e8f6226ef0b2
    }
}
