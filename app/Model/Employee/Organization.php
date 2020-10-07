<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Model\ProvinceInfo;
use App\Model\BasicInformations\SaleProduct;
use App\Model\BasicInformations\Country;
use App\Model\BasicInformations\OrganisationType;
use App\Model\BasicInformations\BusinessType;
use App\Model\BasicInformations\IndustrialType;
use App\Model\Employee\QualitySystemIso9000;
use App\Model\Employee\QualitySystemIso14000;
use App\Model\Employee\QualitySystemIsoHaccp;
use App\Model\Employee\Lab;
use App\Model\Employee\Equipment;
use App\Model\Employee\ProductLab;

class Organization extends Model
{
    protected $table = 'organizations';

    protected $primaryKey = 'id';

    /*
    protected $fillable = ['org_name'];
    */
    
    protected $guarded = [];

    public $timestamps = true;

    // Defining Relationships One To Many
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Defining Relationships 1.4 One To Many
    public function provinceInfoCh()
    {
        return $this->belongsTo(ProvinceInfo::class, 'province_info_ch_id' , 'ch_id');
    }

    public function provinceInfoAm()
    {
        return $this->belongsTo(ProvinceInfo::class, 'province_info_am_id' , 'am_id');
    }

    public function provinceInfoTa()
    {
        return $this->belongsTo(ProvinceInfo::class, 'province_info_ta_id' , 'ta_id');
    }

    // Defining Relationships 1.7 Many To Many
    public function saleProducts()
    {
        return $this->belongsToMany(SaleProduct::class)->withTimestamps();
    }

    // Defining Relationships 1.7 Many To Many
    public function countrys()
    {
        return $this->belongsToMany(Country::class)->withTimestamps();
    }
    
    // Defining Relationships 1.8 One To Many
    public function organisationType()
    {
        return $this->belongsTo(OrganisationType::class);
    }
    
    // Defining Relationships 1.9 One To Many
    public function businessType()
    {
        return $this->belongsTo(BusinessType::class);
    }
    
    // Defining Relationships 1.10 Many To Many
    public function industrialTypes()
    {
        return $this->belongsToMany(IndustrialType::class)->withTimestamps();
    }

    // Defining Relationships 1.11 One To Many
    public function qualitySystemIso9000s()
    {
        return $this->hasMany(QualitySystemIso9000::class, 'org_id');
    }
    public function qualitySystemIso14000s()
    {
        return $this->hasMany(QualitySystemIso14000::class, 'org_id');
    }
    public function qualitySystemIsoHaccps()
    {
        return $this->hasMany(QualitySystemIsoHaccp::class, 'org_id');
    }

    // Defining Relationships One To Many
    public function labs()
    {
        return $this->hasMany(Lab::class);
    }

    // Defining Relationships One To Many
    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

    // Defining Relationships One To Many
    public function productlabs()
    {
        return $this->hasMany(ProductLab::class);
    }

}