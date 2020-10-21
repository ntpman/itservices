<?php

namespace App\Model\Basic;

use Illuminate\Database\Eloquent\Model;

use App\Model\Basic\Brand;

class AssetModel extends Model
{
    protected $table = 'models';
    protected $primaryKey = 'id';
    protected $fillable = ['brand_id','model_name','model_status','created_by','updated_by'];

    public $timestamps = true;

    public function brand() 
    {
        return $this->belongsTo(Brand::class);
    }
}
