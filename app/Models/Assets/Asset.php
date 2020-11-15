<?php

namespace App\Models\Assets;

use Illuminate\Database\Eloquent\Model;

use App\Models\Assets\AssetPicture;
use App\Models\Assets\AssetDetail;
use App\Models\Assets\AssetOwner;
use App\Models\Assets\AssetRepair;
use App\Models\Location;

use App\Models\Basics\Type;
use App\Models\Basics\Subtype;
use App\Models\Basics\Common;
use App\Models\Basics\Brand;
use App\Models\Basics\BrandModel;
use App\Models\Basics\Usage;
use App\Models\Supplier\Supplier;

class Asset extends Model
{
    protected $table = 'assets';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [
        'type_id', 'brand_id', 'common_id', 'usage_id', 'supplier_id', 
        'subtype_id', 'brand_model_id',
        'asset_number', 'asset_serial_number', 'asset_purchase_year', 'asset_warranty_period', 'asset_recived', 'asset_retired'
        'created_by', 'updated_by'
    ];
    */
    
    protected $guarded = [];

    public $timestamps = true;

    /**
     * Eloquent: Relationships
     */
    // belongsTo
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function subtype()
    {
        return $this->belongsTo(Subtype::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function brandModel()
    {
        return $this->belongsTo(BrandModel::class);
    }
    public function common()
    {
        return $this->belongsTo(Common::class);
    }
    public function usage()
    {
        return $this->belongsTo(Usage::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

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
}
