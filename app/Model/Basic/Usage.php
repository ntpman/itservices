<?php

namespace App\Model\Basic;

use Illuminate\Database\Eloquent\Model;

use App\Model\Assets\Asset;

class Usage extends Model
{
    protected $table = 'usages';
    protected $primaryKey = 'id';
    protected $fillable = ['usage_name', 'usage_status', 'created_by', 'updated_by'];

    public $timestamps = true;

    /**
     * Eloquent: Relationships
     */

    // hasMany
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
