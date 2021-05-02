<?php

namespace App\Models\Helpdesks;

use Illuminate\Database\Eloquent\Model;

use App\User;

class RequestAssign extends Model
{
    protected $table = 'request_assigns';
    protected $primaryKey = 'id';
    
    protected $guarded = [];
                            
    public $timestamps = true;

    /**
     * Eloquent: Relationships
     */

    // belongsTo
    public function requestInfo()
    {
        return $this->belongsTo(RequestInfo::class,'request_info_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id' , 'id');
    }

}
