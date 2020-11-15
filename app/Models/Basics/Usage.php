<?php

namespace App\Models\Basics;

use Illuminate\Database\Eloquent\Model;

use App\Models\Assets\Asset;

class Usage extends Model
{
    protected $table = 'usages';
    protected $primaryKey = 'id';
    protected $fillable = ['usage_name', 'usage_status', 'created_by', 'updated_by'];

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
}
