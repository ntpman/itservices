<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Model\Employee\Organization;
use App\Model\Employee\Lab;
use App\Model\Employee\ProductLab;
use App\Model\BasicInformations\ScienceTool;
use App\Model\BasicInformations\MajorTechnology;
use App\Model\BasicInformations\ObjectiveUsage;
use App\Model\BasicInformations\EquipmentUsage;
use App\Model\BasicInformations\EquipmentMaintenance;

class Equipment extends Model
{
    protected $table = 'equipments';
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
        return $this->belongsTo(Organization::class, 'org_id');
    }

    // Defining Relationships One To Many
    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }

    // relation for 3.2.1 ชื่อเครื่องมือEN
    public function scienceTool()
    {
        return $this->belongsTo(ScienceTool::class);
    }

    // relation for 3.10 สาขาเทคโนโลยี มากกว่า 1 รายการ
    public function majorTechnologies()
    {
        return $this->belongsToMany(MajorTechnology::class)->withTimestamps();
    }

    // relation for 3.11 วัตถุประสงค์การใข้งาน มากกว่า 1 รายการ
    public function objectiveUsages()
    {
        return $this->belongsToMany(ObjectiveUsage::class)->withTimestamps();
    }

    // relation for 3.12 ขอบเขตการใข้งานเครื่องมือ
    public function equipmentUsage()
    {
        return $this->belongsTo(EquipmentUsage::class);
    }

    // relation for 3.16 การตรวจเช็คเครื่องมือ
    public function equipmentMaintenance()
    {
        return $this->belongsTo(EquipmentMaintenance::class);
    }

    // relation for 4.5
    public function productLabs()
    {
        return $this->belongsToMany(ProductLab::class)->withTimestamps();
    }
}


