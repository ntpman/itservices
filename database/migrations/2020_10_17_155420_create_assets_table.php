<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('รหัสรายการ');
            $table->unsignedBigInteger('type_id')->comment('รหัสประเภทครุภัณฑ์');
            $table->unsignedBigInteger('subtype_id')->nullable()->comment('รหัสประเภทครุภัณฑ์ย่อย');
            $table->unsignedBigInteger('common_id')->comment('รหัสชื่อครุภัณฑ์');
            $table->string('asset_number', 50)->unique()->comment('หมายเลขครุภัณฑ์');
            $table->string('asset_purchase_year', 4)->comment('ปีที่จัดซื้อ');
            $table->unsignedBigInteger('brand_id')->comment('รหัสยี่ห้อครุภัณฑ์');
            $table->unsignedBigInteger('model_id')->nullable()->comment('รหัสรุ่นครุภัณฑ์');
            $table->string('asset_serial_number', 50)->comment('หมายเลขประจำเครื่อง');
            $table->unsignedBigInteger('supplier_id')->comment('รหัสผู้แทนจำหน่ายครุภัณฑ์');
            $table->date('asset_recived')->comment('วันที่ตรวจรับครุภัณฑ์');
            $table->string('asset_warranty_period', 1)->comment('ระยะเวลาการรับประกัน');
            $table->unsignedBigInteger('usage_id')->comment('รหัสสถานะการใช้งานครุภัณฑ์');
            $table->date('asset_retired')->nullable()->comment('วันที่แจ้งจำหน่ายครุภัณฑ์');
            $table->string('created_by', 50)->comment('รหัสผู้สร้างข้อมูล');
            $table->string('updated_by', 50)->nullable()->comment('รหัสผู้แก้ไขข้อมูลล่าสุด');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('common_id')->references('id')->on('commons');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('usage_id')->references('id')->on('usages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
