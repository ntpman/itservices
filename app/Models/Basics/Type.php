<?php

namespace App\Models\Basics;

use Illuminate\Database\Eloquent\Model;

use App\Models\Assets\Asset;
use App\Models\Basics\Subtype;

class Type extends Model
{
    protected $table = 'types';
    protected $primaryKey = 'id';
    protected $fillable = ['type_name', 'type_status', 'created_by', 'updated_by'];

    public $timestamps = true;

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
    }
}
