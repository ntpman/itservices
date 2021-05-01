<?php

namespace App\Models\Helpdesks;

use Illuminate\Database\Eloquent\Model;

use App\Models\Helpdesk\RequestInfo;
use App\User;

class RequestAssign extends Model
{
    protected $table = 'request_assigns';
    protected $primaryKey = 'id';
    
    // protected $fillable = ['request_infos_id','user_id','request_status',
    //                         'assign_date','created_by',];

    protected $guarded = [];
                            
    public $timestamp = true;

    /**
     * Eloquent: Relationships
     */

    // belongsTo
    public function requestInfoId()
    {
        return $this->belongsTo(RequstInfo::class, 'request_infos_id' , 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id' , 'id');
    }

    // public function provinceCh()
    // {
    //     return $this->belongsTo(Province::class, 'supplier_province_id' , 'ch_id');
    // }

    // // hasMany
    // public function users()
    // {
    //     return $this->hasMany(User::class);
    // }
}
