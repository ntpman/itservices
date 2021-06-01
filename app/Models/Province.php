<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Supplier;

class Province extends Model
{
    protected $table = 'provinces';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [
        'ad_level', 'ta_id', 'tambon_t', 'tambon_e', 'am_id', 'amphoe_t', 'amphoe_e', 'ch_id', 'changwat_t', 'changwat_e', 'lat', 'long'
    ];
    */
    
    protected $guarded = [];

    // public $timestamps = true;

    /**
     * Eloquent: Relationships
     */
    // belongsTo
    
    // hasMany
    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
}
