<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_assigns', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('รหัสรายการมอบหมายงาน');
            $table->unsignedBigInteger('request_info_id')->comment('รหัสรายการแบบสั่งซ่อม');
            $table->unsignedBigInteger('user_id')->comment('รหัสผู้ถูกมอบหมายงาน');
            $table->string('assign_status',100)->comment('สถานะการมอบหมายงาน');
            $table->date('assign_date')->comment('วันที่มอบหมายงาน');
            $table->string('created_by', 50)->comment('รหัสผู้สร้างข้อมูล');
            $table->timestamps();

            $table->foreign('request_info_id')->references('id')->on('request_infos');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_statuses');
    }
}
