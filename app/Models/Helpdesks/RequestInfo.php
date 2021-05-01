<?php

namespace App\Models\Helpdesks;

use Illuminate\Database\Eloquent\Model;

use App\Models\Helpdesks\RequestInfo;

class RequestInfo extends Model
{
    protected $table = 'request_infos';
    protected $primaryKey = 'id';

    // protected $fillable = ['request_date', 'director', 'document_route', 'request_owner',
    //                         'division','sub_division','building','floor','room','phone',
    //                         'email','request_type','request_objective','inv_number',
    //                         'request_detail','request_file','request_recieved', 'request_number',
    //                         'request_responsed','request_status','created_by', 'updated_by'];


    protected $guarded = [];

    public $timestamps = true;

        /**
     * Eloquent: Relationships
     */

    // belongsTo
    // public function requestInfoId()
    // {
    //     return $this->belongsTo(RequstInfo::class, 'request_infos_id' , 'id');
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id' , 'id');
    // }

    // public function provinceCh()
    // {
    //     return $this->belongsTo(Province::class, 'supplier_province_id' , 'ch_id');
    // }

    // hasMany
    public function requestAssigns()
    {
        return $this->hasMany(RequestInfo::class);
    }

}
