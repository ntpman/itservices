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
            $table->string('supplier_address',255)->comment('ที่อยู่');
            $table->string('supplier_subdistrict',255)->comment('ตำบล/แขวง');
            $table->string('supplier_district',255)->comment('อำเภอ/เขต');
            $table->string('supplier_province',255)->comment('จังหวัด');
            $table->string('supplier_postcode',5)->comment('รหัสไปรษณีย์');
            $table->string('supplier_phone',255)->comment('หมายเลขโทรศัพท์');
            $table->string('supplier_email',255)->comment('อีเมล');
            $table->string('supplier_contact',255)->comment('ผู้ติดต่อ');
            $table->string('created_by',50)->comment('รหัสผู้สร้างข้อมูล');
            $table->string('updated_by',50)->comment('รหัสผู้แก้ไขข้อมูลล่าสุด');
            $table->timestamps();
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
