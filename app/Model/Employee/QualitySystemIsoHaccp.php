<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Organization;
use App\Model\Employee\Operation;

class QualitySystemIsoHaccp extends Model
{
    protected $table = 'quality_system_iso_haccps';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [''];
    */
    
    protected $guarded = [];

    public $timestamps = true;

    // Defining Relationships One To Many
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    // Defining Relationships One To Many
    public function operation()
    {
        return $this->belongsTo(Operation::class);
    }
}
