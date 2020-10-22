<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetSubtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_subtypes', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('รหัสรายการ');
            $table->unsignedBigInteger('asset_type_id')->comment('รหัสประเภทครุภัณฑ์');
            $table->string('subtype_name',50)->comment('ประเภทครุภัณฑ์ย่อย');
            $table->string('subtype_status',1)->default('A')->comment('สถานะการใช้ข้อมูล');
            $table->string('created_by',50)->comment('รหัสผู้สร้างข้อมูล');
            $table->string('updated_by',50)->nullable()->comment('รหัสผู้แก้ไขข้อมูลล่าสุด');
            $table->timestamps();

            $table->foreign('asset_type_id')->references('id')->on('asset_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asset_subtypes');
    }
}
