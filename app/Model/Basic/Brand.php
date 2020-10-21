<?php

namespace App\Model\Basic;

use Illuminate\Database\Eloquent\Model;

use App\Model\Basic\AssetModel;

class Brand extends Model
{
    protected $table = 'brands';
    protected $primaryKey = 'id';
    protected $fillable = ['brand_full_name','brand_abbr_name','brand_status','created_by','updated_by'];

    public $timestamps = true;

    public function models() {
        return $this->hasMany(AssetModel::class);
    }

}
