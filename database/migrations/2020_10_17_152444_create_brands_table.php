<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('รหัสรายการ');
            $table->string('brands_name',255)->unique()->comment('ชื่อผลิตภัณฑ์');
            $table->string('brands_status',1)->default('A')->comment('สถานะการใช้ข้อมูล');
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
        Schema::dropIfExists('brands');
    }
}
