<?php

namespace App\Model\Basic;

use Illuminate\Database\Eloquent\Model;

use App\Model\Basic\Type;

class SubType extends Model
{
    protected $table = 'asset_subtypes';
    protected $primaryKey = 'id';
    protected $fillable = ['asset_type_id','subtype_name','subtype_status','created_by','updated_by',];

    public $timestapms = true;

    public function type() {
        return $this->belongsTo(Type::class);
    }
}
