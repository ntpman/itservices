<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('รหัสรายการ');
            $table->unsignedBigInteger('asset_id')->comment('รหัสชื่อครุภัณฑ์');
            $table->unsignedBigInteger('building_id')->comment('รหัสชื่ออาคารที่ติดตั้งใช้งาน');
            $table->string('location_floor', 25)->comment('ชั้นที่ติดตั้งใช้งาน');
            $table->string('location_room', 50)->comment('ห้องที่ติดตั้งใช้งาน');
            $table->string('created_by', 50)->nullable()->comment('รหัสผู้สร้างข้อมูล');
            $table->string('updated_by', 50)->nullable()->comment('รหัสผู้แก้ไขข้อมูลล่าสุด');
            $table->timestamps();

            $table->foreign('asset_id')->references('id')->on('assets');
            $table->foreign('building_id')->references('id')->on('buildings');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
