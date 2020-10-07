<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogCommentLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_comment_labs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('');
            $table->unsignedBigInteger('lab_id')->comment('');
            $table->unsignedBigInteger('survey_status_id')->comment('');
            $table->text('comment_lab_detail')->nullable()->comment('');
            $table->timestamp('reject_date')->nullable()->comment('');
            $table->timestamp('edit_date')->nullable()->comment('');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('lab_id')->references('id')->on('labs');
            $table->foreign('survey_status_id')->references('id')->on('survey_statuses');
        });

        Schema::create('log_comment_lab_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('log_comment_lab_id')->comment('');
            $table->string('file')->nullable()->comment('');
            $table->timestamps();

            $table->foreign('log_comment_lab_id')
                ->references('id')->on('log_comment_labs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_comment_lab_files');
        Schema::dropIfExists('log_comment_labs');
    }
}
