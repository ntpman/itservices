<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('รหัสรายการ');
            $table->string('supplier_name',255)->unique()->comment('ชื่อผู้จำหน่ายสินค้า');
            $table->string('supplier_address', 255)->comment('ที่อยู่');
            $table->integer('supplier_province_id')->comment('จังหวัด');
            $table->integer('supplier_district_id')->comment('อำเภอ/เขต');
            $table->integer('supplier_subdistrict_id')->nullable()->comment('ตำบล/แขวง');
            $table->string('supplier_postcode', 5)->comment('รหัสไปรษณีย์');
            $table->string('supplier_phone', 255)->comment('หมายเลขโทรศัพท์');
            $table->string('supplier_email', 255)->comment('อีเมล');
            $table->string('supplier_contact', 255)->comment('ผู้ติดต่อ');
            $table->string('created_by', 50)->nullable()->comment('รหัสผู้สร้างข้อมูล');
            $table->string('updated_by', 50)->nullable()->comment('รหัสผู้แก้ไขข้อมูลล่าสุด');
            $table->timestamps();

            // Foreign Key
            $table->foreign('supplier_province_id')->references('ta_id')->on('provinces');
            $table->foreign('supplier_district_id')->references('am_id')->on('provinces');
            $table->foreign('supplier_subdistrict_id')->references('ch_id')->on('provinces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
