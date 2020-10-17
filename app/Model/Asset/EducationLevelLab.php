<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;

use App\Model\Employee\Lab;

class EducationLevelLab extends Model
{
    protected $table = 'education_level_labs';

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
