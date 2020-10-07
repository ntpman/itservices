<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_labs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment(''); 
            $table->unsignedBigInteger('organization_id')->nullable()->comment(''); 
            $table->unsignedBigInteger('lab_id')->comment('');
            $table->string('product_lab_name')->comment('');
            $table->string('product_type_other')->nullable()->comment('');
            $table->string('product_lab_standard')->nullable()->comment('');
            $table->string('product_lab_test_name')->nullable()->comment('');
            $table->unsignedBigInteger('testing_calibrating_list_id')->nullable()->comment('');
            $table->unsignedBigInteger('testing_calibrating_type_id')->nullable()->comment('');
            $table->string('testing_calibrating_type_other')->nullable()->comment('');
            $table->unsignedBigInteger('testing_calibrating_method_id')->nullable()->comment('');
            $table->string('testing_calibrating_method_detail')->nullable()->comment('');
            $table->string('product_lab_test_unit')->nullable()->comment('');
            $table->integer('product_lab_test_duration')->nullable()->comment('');
            $table->integer('product_lab_test_fee')->nullable()->comment('');
            $table->string('product_lab_material_ref')->nullable()->comment('');
            $table->string('product_lab_material_ref_from')->nullable()->comment('');
            $table->string('result_control_other')->nullable()->comment('');
            $table->integer('proficiency_testing_id')->nullable()->comment('');
            $table->string('proficiency_testing_by')->nullable()->comment('');
            $table->integer('proficiency_testing_year')->nullable()->comment('');          
            $table->unsignedBigInteger('certify_laboratory_id')->nullable()->comment('');
            $table->boolean('completed')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('lab_id')->references('id')->on('labs');
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->foreign('testing_calibrating_list_id')->references('id')->on('testing_calibrating_lists');
            $table->foreign('testing_calibrating_type_id')->references('id')->on('testing_calibrating_types');
            $table->foreign('testing_calibrating_method_id')->references('id')->on('testing_calibrating_methods');
            $table->foreign('certify_laboratory_id')->references('id')->on('certify_laboratories');
        });
        
        Schema::create('product_lab_product_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_lab_id');
            $table->unsignedBigInteger('product_type_id');
            $table->timestamps();
            
            $table->foreign('product_lab_id')
                ->references('id')->on('product_labs');
            $table->foreign('product_type_id')
                ->references('id')->on('product_types');
        });
        
        Schema::create('equipment_product_lab', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('equipment_id');
            $table->unsignedBigInteger('product_lab_id');
            $table->timestamps();
            
            $table->foreign('equipment_id')
                ->references('id')->on('equipments');
            $table->foreign('product_lab_id')
                ->references('id')->on('product_labs');    
        });

        Schema::create('product_lab_result_control', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_lab_id');
            $table->unsignedBigInteger('result_control_id');
            $table->timestamps();
            
            $table->foreign('product_lab_id')
                ->references('id')->on('product_labs');
            $table->foreign('result_control_id')
                ->references('id')->on('result_controls');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_lab_product_type');
        Schema::dropIfExists('equipment_product_lab');
        Schema::dropIfExists('product_lab_result_control');
        Schema::dropIfExists('product_labs');
    }
}
