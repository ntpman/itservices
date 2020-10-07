<?php

namespace App\Model\Employee\Development;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Lab;

class Statistic extends Model
{
    protected $table = 'development_statistic_labs';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [''];
    */
    
    protected $guarded = [];

    public $timestamps = true;

    // Defining Relationships One To Many
    public function labs()
    {
        return $this->belongsTo(Lab::class);
    }
}
