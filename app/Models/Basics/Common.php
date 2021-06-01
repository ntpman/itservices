<?php

namespace App\Models\Basics;

use Illuminate\Database\Eloquent\Model;

use App\Models\Assets\Asset;

class Common extends Model
{
    protected $table = 'commons';
    protected $primaryKey = 'id';
    protected $fillable = ['common_name', 'common_status', 'created_by', 'updated_by'];

    public $timestaps = true;

    /**
     * Eloquent: Relationships
     */
    // belongsTo

    // hasMany
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
