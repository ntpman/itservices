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
            $table->string('brand_full_name', 255)->unique()->comment('ชื่อเต็มยี่ห้อผลิตภัณฑ์');
            $table->string('brand_abbr_name', 20)->nullable()->comment('ชื่อย่อยี่ห้อผลิตภัณฑ์');
            $table->string('brand_status', 1)->default('A')->comment('สถานะการใช้ข้อมูล');
            $table->string('created_by', 50)->comment('รหัสผู้สร้างข้อมูล');
            $table->string('updated_by', 50)->nullable()->comment('รหัสผู้แก้ไขข้อมูลล่าสุด');
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
