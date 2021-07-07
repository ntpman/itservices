<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('รหัสรายการหนังสือ');
            $table->integer('received_no')->comment('เลขที่รับหนังสือ');
            $table->date('received_date')->comment('วันที่รับหนังสือ');
            $table->string('books_no')->comment('เลขที่หนังสือ')->nullable();
            $table->string('books_subject')->comment('เรื่องหนังสือ');
            $table->string('books_owner')->comment('หน่วยงานเจ้าของหนังสือ');
            $table->text('commands')->comment('ข้อสั่งการ');
            $table->date('due_date')->comment('วันที่ครบกำหนดตามข้อสั่งการหรือตามหนังสือ')->nullable();
            $table->string('books_file', 50)->comment('ไฟล์หนังสือรับ');
            $table->unsignedBigInteger('user_id')->comment('รหัสผู้บันทึกรายการ');
            $table->unsignedBigInteger('responsed_id')->comment('รหัสผู้รับผิดชอบดำเนินการ');
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
        Schema::dropIfExists('books');
    }
}
