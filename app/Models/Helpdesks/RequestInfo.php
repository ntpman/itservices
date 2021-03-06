<?php

namespace App\Models\Helpdesks;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Models\Basics\Building;

class RequestInfo extends Model
{
    protected $table = 'request_infos';
    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = true;

        /**
     * Eloquent: Relationships
     */

    public function requestAssigns()
    {
        return $this->hasMany(RequestAssign::class,'request_info_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id' , 'id');
    }

    public function buildingName()
    {
        return $this->belongsTo(Building::class, 'building_id' , 'id');
    }

}
