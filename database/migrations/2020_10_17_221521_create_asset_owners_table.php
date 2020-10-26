<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_owners', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('รหัสรายการ');
            $table->unsignedBigInteger('asset_id')->comment('รหัสชื่อครุภัณฑ์');
            $table->string('asset_owner_name', 150)->comment('ผู้รับผิดชอบครุภัณฑ์');
            $table->date('asset_owner_started')->comment('วันที่รับมอบครุภัณฑ์');
            $table->date('asset_owner_ended')->nullable()->comment('วันที่ส่งคืนครุภัณฑ์');
            $table->string('created_by', 50)->comment('รหัสผู้สร้างข้อมูล');
            $table->string('updated_by', 50)->nullable()->comment('รหัสผู้แก้ไขข้อมูลล่าสุด');
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
        Schema::dropIfExists('asset_owners');
    }
}
