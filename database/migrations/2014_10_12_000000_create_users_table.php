<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('ชื่อผู้ใช้งาน');
            $table->string('email')->unique()->comment('อีเมล์');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable()->comment('รูปภาพประจำตัว');
            $table->integer('role')->default(1)->comment('สิทธิ์การใช้งาน');
            $table->integer('status')->default(1)->comment('สถานะผู้ใช้งาน');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
