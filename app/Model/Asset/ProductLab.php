<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Model\Employee\Lab;
use App\Model\Employee\Equipment;

use App\Model\BasicInformations\ProductType;
use App\Model\BasicInformations\TestingCalibratingList;
use App\Model\BasicInformations\TestingCalibratingType;
use App\Model\BasicInformations\TestingCalibratingMethod;
use App\Model\BasicInformations\ResultControl;
use App\Model\BasicInformations\CertifyLaboratory;

class ProductLab extends Model
{
    protected $table = 'product_labs';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = true;

    // relation for User who take action with this productLab
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Defining Relationships One To Many
    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }

    // Defining Relationships One To Many
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    
    // 4.5 relation for เครื่องมือในแลป
    public function equipments()
    {
        return $this->belongsToMany(Equipment::class)->withTimestamps();
    }

    // relation for 4.2 ประเภทผลตภัณฑ์
    public function productTypes()
    {
        return $this->belongsToMany(ProductType::class)->withTimestamps();
    }

    // relation for 4.6 ประเภทรายากรทดสอบสอบเทียบ
    public function testingCalibratingList()
    {
        return $this->belongsTo(TestingCalibratingList::class);

    }
    // relation for 4.7 ประเภทการทดสอบ/สอบเทียบ
    public function testingCalibratingType()
    {
        return $this->belongsTo(TestingCalibratingType::class);
    }

    // relation for 4.8 วิธีการทดสอบสอบเทียบมาตราฐาน
    public function testingCalibratingMethod()
    {
        return $this->belongsTo(TestingCalibratingMethod::class);
    }

    // relation for 4.14 การควบคุมคุณภาพผลการทดสอบภายใน
    public function resultControls()
    {
        return $this->belongsToMany(ResultControl::class)->withTimestamps();
    }

     // relation for 4.16 การรับรองความสามารถห้องปฏิบัติการ
    public function certifyLaboratory()
    {
        return $this->belongsTo(CertifyLaboratory::class);
    }

}
