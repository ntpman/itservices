<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment(''); //รหัสผู้ใช้งานระบบ
            $table->unsignedBigInteger('organization_id')->comment('');
            $table->string('lab_name')->comment(''); //2.1
            $table->string('lab_code')->comment(''); //2.2
            $table->unsignedBigInteger('location_lab_id')->nullable()->comment(''); //2.3
            $table->string('location_lab_other')->nullable()->comment(''); 
            $table->unsignedBigInteger('industrial_estate_id')->nullable()->comment('');
            $table->string('industrial_estate_other')->nullable()->comment('');
            $table->unsignedBigInteger('laboratory_type_id')->nullable()->comment('');
            $table->unsignedBigInteger('area_service_id')->nullable()->comment('');
            $table->integer('lab_employee_amount')->nullable()->comment('');
            $table->unsignedBigInteger('fixed_cost_id')->nullable()->comment('');
            $table->unsignedBigInteger('income_per_year_id')->nullable()->comment('');
            $table->longText('lab_development_other')->nullable()->comment('');
            $table->unsignedBigInteger('employee_training_id')->nullable()->comment('');
            $table->longText('lab_environmental_management')->nullable()->comment('');
            $table->longText('lab_development_problem')->nullable()->comment('');
            $table->longText('lab_development_request')->nullable()->comment('');
            $table->longText('lab_development_suggestion')->nullable()->comment('');
            $table->unsignedBigInteger('survey_status_id')->default(1)->comment('');
            $table->boolean('completed')->default(false);
            $table->timestamp('send_date')->nullable()->comment('');
            $table->timestamp('approve_date')->nullable()->comment('');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->foreign('location_lab_id')->references('id')->on('location_labs');
            $table->foreign('industrial_estate_id')->references('id')->on('industrial_estates');
            $table->foreign('laboratory_type_id')->references('id')->on('laboratory_types');
            $table->foreign('area_service_id')->references('id')->on('area_services');
            $table->foreign('fixed_cost_id')->references('id')->on('fixed_costs');
            $table->foreign('income_per_year_id')->references('id')->on('income_per_years');
            $table->foreign('employee_training_id')->references('id')->on('employee_trainings');
            $table->foreign('survey_status_id')->references('id')->on('survey_statuses');
        });

        // 2.6
        Schema::create('education_level_labs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lab_id')->comment('');
            $table->integer('education_primary_amount')->nullable()->comment('');
            $table->integer('education_secondary_amount')->nullable()->comment('');
            $table->integer('education_vocational_amount')->nullable()->comment('');
            $table->integer('education_high_vocational_amount')->nullable()->comment('');
            $table->integer('education_bachelor_amount')->nullable()->comment('');
            $table->integer('education_master_amount')->nullable()->comment('');
            $table->integer('education_doctor_amount')->nullable()->comment('');
            $table->string('education_other')->nullable()->comment('');
            $table->timestamps();

            $table->foreign('lab_id')
                ->references('id')->on('labs');
        });

        // 2.10.1
        // key => 1
        Schema::create('development_iso_iec17025_labs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lab_id')->comment('');
            $table->integer('development_amount')->nullable()->comment('');
            $table->integer('development_day')->nullable()->comment('');
            $table->integer('development_interested')->nullable()->comment('');
            $table->timestamps();

            $table->foreign('lab_id')
                ->references('id')->on('labs');
        });
         // key => 2
        Schema::create('development_uncertainty_labs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lab_id')->comment('');
            $table->integer('development_amount')->nullable()->comment('');
            $table->integer('development_day')->nullable()->comment('');
            $table->integer('development_interested')->nullable()->comment('');
            $table->timestamps();

            $table->foreign('lab_id')
                ->references('id')->on('labs');
        });
         // key => 3
        Schema::create('development_method_labs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lab_id')->comment('');
            $table->integer('development_amount')->nullable()->comment('');
            $table->integer('development_day')->nullable()->comment('');
            $table->integer('development_interested')->nullable()->comment('');
            $table->timestamps();

            $table->foreign('lab_id')
                ->references('id')->on('labs');
        });
         // key => 4
        Schema::create('development_internal_labs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lab_id')->comment('');
            $table->integer('development_amount')->nullable()->comment('');
            $table->integer('development_day')->nullable()->comment('');
            $table->integer('development_interested')->nullable()->comment('');
            $table->timestamps();

            $table->foreign('lab_id')
                ->references('id')->on('labs');
        });
         // key => 5
        Schema::create('development_statistic_labs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lab_id')->comment('');
            $table->integer('development_amount')->nullable()->comment('');
            $table->integer('development_day')->nullable()->comment('');
            $table->integer('development_interested')->nullable()->comment('');
            $table->timestamps();

            $table->foreign('lab_id')
                ->references('id')->on('labs');
        });
         // key => 6
        Schema::create('development_technique_labs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lab_id')->comment('');
            $table->integer('development_amount')->nullable()->comment('');
            $table->integer('development_day')->nullable()->comment('');
            $table->integer('development_interested')->nullable()->comment('');
            $table->timestamps();

            $table->foreign('lab_id')
                ->references('id')->on('labs');
        });
         // key => 7
        Schema::create('development_safety_labs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lab_id')->comment('');
            $table->integer('development_amount')->nullable()->comment('');
            $table->integer('development_day')->nullable()->comment('');
            $table->integer('development_interested')->nullable()->comment('');
            $table->timestamps();

            $table->foreign('lab_id')
                ->references('id')->on('labs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_level_labs');
        Schema::dropIfExists('development_iso_iec17025_labs');
        Schema::dropIfExists('development_uncertainty_labs');
        Schema::dropIfExists('development_method_labs');
        Schema::dropIfExists('development_internal_labs');
        Schema::dropIfExists('development_statistic_labs');
        Schema::dropIfExists('development_technique_labs');
        Schema::dropIfExists('development_safety_labs');
        Schema::dropIfExists('labs');
    }
}
