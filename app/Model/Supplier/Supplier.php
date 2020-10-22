<?php

namespace App\Model\Supplier;

use Illuminate\Database\Eloquent\Model;

use App\Model\Asset;

class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [
        'supplier_name', 'supplier_address', 'supplier_province_id', 'supplier_district_id', 'supplier_subdistrict_id',
        'supplier_postcode', 'supplier_phone', 'supplier_email', 'supplier_contact', 'created_by', 'updated_by'
    ];
    */
    
    protected $guarded = [];

    public $timestamps = true;

    /**
     * Eloquent: Relationships
     */
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
