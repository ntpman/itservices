<?php

namespace App\Model\Assets;

use Illuminate\Database\Eloquent\Model;

use App\Model\Assets\AssetPicture;
use App\Model\Assets\AssetDetail;
use App\Model\Assets\AssetOwner;
use App\Model\Assets\AssetRepair;
use App\Model\Location;

use App\Model\Basic\Type;
use App\Model\Basic\Subtype;
use App\Model\Basic\CommonName;
use App\Model\Basic\Brand;
use App\Model\Basic\AssetModel;
use App\Model\Basic\Usage;
use App\Model\Supplier\Supplier;

class Asset extends Model
{
    protected $table = 'assets';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [
        'asset_type_id', 'asset_subtype_id', 'asset_common_name_id', 'asset_number', 'purchase_year',
        'brand_id', 'model_id', 'serial_number', 'supplier_id', 'recived_asset', 'warranty_period',
        'asset_usage_id', 'retired_asset', 'created_by', 'updated_by'
    ];
    */
    
    protected $guarded = [];

    public $timestamps = true;

    /**
     * Eloquent: Relationships
     */

    // hasMany
    public function assetPictures()
    {
        return $this->hasMany(AssetPicture::class);
    }
    public function assetDetails()
    {
        return $this->hasMany(AssetDetail::class);
    }
    public function assetOwners()
    {
        return $this->hasMany(AssetOwner::class);
    }
    public function assetRepairs()
    {
        return $this->hasMany(AssetRepair::class);
    }
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
    
    // belongsTo
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function subtype()
    {
        return $this->belongsTo(Subtype::class);
    }
    public function assetCommonName()
    {
        return $this->belongsTo(CommonName::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function model()
    {
        return $this->belongsTo(AssetModel::class);
    }
    public function assetUsage()
    {
        return $this->belongsTo(Usage::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
