<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\QualitySystemIso9000;
use App\Model\Employee\QualitySystemIso14000;
use App\Model\Employee\QualitySystemIsoHaccp;

class Operation extends Model
{
    protected $table = 'operations';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [''];
    */
    
    protected $guarded = [];

    public $timestamps = true;

    // Defining Relationships One To Many
    public function qualitySystemIso9000s()
    {
        return $this->hasMany(QualitySystemIso9000::class);
    }
    // Defining Relationships One To Many
    public function qualitySystemIso14000s()
    {
        return $this->hasMany(QualitySystemIso14000::class);
    }
    // Defining Relationships One To Many
    public function qualitySystemIsoHaccps()
    {
        return $this->hasMany(QualitySystemIsoHaccp::class);
    }
}
