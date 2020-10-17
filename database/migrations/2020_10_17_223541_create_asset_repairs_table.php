<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_repairs', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('รหัสรายการ');
            $table->unsignedBigInteger('asset_id')->comment('รหัสชื่อครุภัณฑ์');
            $table->date('repair_date')->comment('วันที่ดำเนินการซ่อม');
            $table->string('repair_list',255)->comment('รายการซ่อมบำรุง');
            $table->string('repairer_name',255)->comment('ชื่อผู้ซ่อมบำรุง');
            $table->string('repairer_org',255)->comment('ชื่อหน่วยงานผู้ซ่อมบำรุง');
            $table->string('repair_comment',255)->comment('หมายเหตุการซ่อมบำรุง');
            $table->string('created_by',50)->comment('รหัสผู้สร้างข้อมูล');
            $table->string('updated_by',50)->comment('รหัสผู้แก้ไขข้อมูลล่าสุด');
            $table->timestamps();

            $table->foreign('asset_id')->references('id')->on('assets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asset_repairs');
    }
}
