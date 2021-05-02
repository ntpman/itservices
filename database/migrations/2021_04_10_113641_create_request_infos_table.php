<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_infos', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('รหัสรายการ');
            $table->date('request_date')->comment('วันที่จัดทำเอกสาร');
            $table->string('org_responsible', 20)->comment('หน่วยงานที่รับผิดชอบ');
            $table->string('chain_of_command', 120)->comment('สายบังคับบัญชาของผู้แจ้ง');
            $table->string('request_owner',100)->comment('ชื่อผู้แจ้ง');
            $table->string('division', 255)->comment('หน่วยงานผู้แจ้ง');
            $table->string('sub_division', 100)->comment('กลุ่มงานผู้แจ้ง');
            $table->string('building', 50)->comment('อาคาร');
            $table->string('floor', 50)->comment('ชั้น')->nullable();
            $table->string('room', 50)->comment('ห้อง')->nullable();
            $table->string('phone', 50)->comment('หมายเลขโทรศัพท์');
            $table->string('email', 50)->comment('อีเมลผู้แจ้ง');
            $table->string('request_type', 50)->comment('ความประสงค์');
            $table->text('request_objective')->comment('สิ่งที่ต้องการให้ดำเนินการ');
            $table->string('inv_number', 150)->comment('หมายเลขครุภัณฑ์')->nullable();
            $table->text('request_detail', 150)->comment('รายละเอียดของความต้องการ');
            $table->date('request_recieved')->comment('วันที่รับเอกสาร')->nullable();
            $table->text('request_number', 50)->comment('เลขที่เอกสารของฝ่าย');
            $table->unsignedBigInteger('user_id')->comment('รหัสผู้ถูกมอบหมายงาน');
            $table->text('request_status', 50)->comment('สถานะการดำเนินงาน');
            $table->string('request_file', 100)->comment('ไฟล์ใบแจ้งปัญหา');
            $table->string('created_by', 50)->comment('รหัสผู้สร้างข้อมูล');
            $table->string('updated_by', 50)->nullable()->comment('รหัสผู้แก้ไขข้อมูลล่าสุด');
            $table->timestamps();

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
        Schema::dropIfExists('request_infos');
    }
}