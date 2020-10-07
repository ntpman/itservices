<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Model\Employee\Organization;
use App\Model\Employee\EducationLevelLab;
use App\Model\Employee\Equipment;
use App\Model\Employee\ProductLab;
use App\Model\Employee\Development\Internal;
use App\Model\Employee\Development\IsoIec17025;
use App\Model\Employee\Development\Method;
use App\Model\Employee\Development\Safety;
use App\Model\Employee\Development\Statistic;
use App\Model\Employee\Development\Technique;
use App\Model\Employee\Development\Uncertainty;
use App\Model\BasicInformations\LocationLab;
use App\Model\BasicInformations\IndustrialEstate;
use App\Model\BasicInformations\LaboratoryType;
use App\Model\BasicInformations\AreaService;
use App\Model\BasicInformations\EducationLevel;
use App\Model\BasicInformations\FixedCost;
use App\Model\BasicInformations\IncomePerYear;
use App\Model\BasicInformations\EmployeeTraining;
use App\Model\BasicInformations\SurveyStatus;

use App\Model\Logs\LogCommentLab;

class Lab extends Model
{
    protected $table = 'labs';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [''];
    */
    
    protected $guarded = [];

    public $timestamps = true;

    // Defining Relationships One To Many
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Defining Relationships One To Many
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    // Defining Relationships One To Many
    public function surveyStatus()
    {
        return $this->belongsTo(SurveyStatus::class);
    }

    // Defining Relationships One To Many
    public function locationLab()
    {
        return $this->belongsTo(LocationLab::class);
    }

    // Defining Relationships One To Many
    public function industrialEstate()
    {
        return $this->belongsTo(IndustrialEstate::class);
    }

    // Defining Relationships One To Many
    public function laboratoryType()
    {
        return $this->belongsTo(LaboratoryType::class);
    }

    // Defining Relationships One To Many
    public function areaService()
    {
        return $this->belongsTo(AreaService::class);
    }

    // Defining Relationships One To Many
    public function educationLevelLabs()
    {
        return $this->hasMany(EducationLevelLab::class);
    }

    // Defining Relationships One To Many
    public function fixedCost()
    {
        return $this->belongsTo(FixedCost::class);
    }

    // Defining Relationships One To Many
    public function incomePerYear()
    {
        return $this->belongsTo(IncomePerYear::class);
    }

    // Defining Relationships One To Many
    public function employeeTraining()
    {
        return $this->belongsTo(EmployeeTraining::class);
    }

    // Defining Relationships One To Many
    public function internals()
    {
        return $this->hasMany(Internal::class);
    }
    public function isoIec17025s()
    {
        return $this->hasMany(IsoIec17025::class);
    }
    public function methods()
    {
        return $this->hasMany(Method::class);
    }
    public function safetys()
    {
        return $this->hasMany(Safety::class);
    }
    public function statistics()
    {
        return $this->hasMany(Statistic::class);
    }
    public function techniques()
    {
        return $this->hasMany(Technique::class);
    }
    public function uncertaintys()
    {
        return $this->hasMany(Uncertainty::class);
    }

    // Defining Relationships One To Many
    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

    // Defining Relationships One To Many
    public function productLabs()
    {
        return $this->hasMany(ProductLab::class);
    }

    // Defining Relationships One To Many
    public function LogCommentLabs()
    {
        return $this->hasMany(LogCommentLab::class);
    }
}
