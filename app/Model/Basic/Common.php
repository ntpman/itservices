<?php

namespace App\Model\Basic;

use Illuminate\Database\Eloquent\Model;

use App\Model\Assets\Asset;

class Common extends Model
{
    protected $table = 'commons';
    protected $primaryKey = 'id';
    protected $fillable = ['common_name', 'common_status', 'created_by', 'updated_by'];

    public $timestaps = true;

    /**
     * Eloquent: Relationships
     */

    // hasMany
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
