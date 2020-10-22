<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Supplier;

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
    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
}
