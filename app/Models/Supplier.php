<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Province;
use App\Models\Assets\Asset;

class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [
        'supplier_name', 'supplier_address', 'supplier_subdistrict_id', 'supplier_district_id', 'supplier_province_id',
        'supplier_postcode', 'supplier_phone', 'supplier_email', 'supplier_contact', 'created_by', 'updated_by'
    ];
    */
    
    protected $guarded = [];

    public $timestamps = true;

    /**
     * Eloquent: Relationships
     */
    // belongsTo
    public function provinceTa()
    {
        return $this->belongsTo(Province::class, 'supplier_subdistrict_id' , 'ta_id');
    }

    public function provinceAm()
    {
        return $this->belongsTo(Province::class, 'supplier_district_id' , 'am_id');
    }

    public function provinceCh()
    {
        return $this->belongsTo(Province::class, 'supplier_province_id' , 'ch_id');
    }

    // hasMany
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
