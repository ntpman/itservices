<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('รหัสผู้ใช้งานระบบที่เทคแอคชั่นกกับเรคอร์ด');            
            $table->unsignedBigInteger('lab_id')->comment('');
            $table->string('equipment_code')->nullable()->comment('รหัสเครื่องมือ AABCC-MNN-RRRSS');         
            $table->unsignedBigInteger('science_tool_id')->nullable()->comment('ชื่อเครื่องมือEN');               
            $table->string('science_tool_other_name', 255)->nullable()->comment('');        
            $table->string('science_tool_other_abbr', 255)->nullable()->comment('');        
            $table->string('equipment_name_th', 255)->nullable()->comment('ชื่อเครื่องมือ TH');                   
            $table->string('equipment_brand', 255)->nullable()->comment('ยี่ห้อเครื่องมือ');                      
            $table->string('equipment_model', 255)->nullable()->comment('รุ่นเครื่องมือ');                       
            $table->string('equipment_number', 255)->nullable()->comment('รหัสเครื่องมือในหน่วยงาน');          
            $table->integer('equipment_year')->nullable()->comment('ปีที่ซื้อเครื่องมือ');                          
            $table->bigInteger('equipment_price')->nullable()->comment('มูลค่าเครื่องมือ');                         
            $table->string('equipment_supplier', 255)->nullable()->comment('บริษัทที่จำหน่าจย');                
            //3.10 สาขาเทคโนเครื่องมือ FK many with other table
            $table->string('major_technology_other', 255)->nullable()->comment('สาขาเทคโนเครื่องมืออื่นๆ ');   
            //3.11วัตถุประสงค์การใช้งาน FK many with other Table
            $table->unsignedBigInteger('equipment_usage_id')->comment('ขอบเขตการใช้งานเครื่องมือ');             
            $table->string('equipment_ability', 255)->nullable()->comment('คสามารถคละเอียดเครื่องมือ');         
            $table->string('equipment_image')->nullable()->comment('รูปเครื่องมือ');                              
            $table->integer('equipment_calibration_id')->nullable()->comment('การสอบเทียบเครื่องมือ');         
            $table->string('equipment_calibration_by', 255)->nullable()->comment('การสอบเทียบเครื่องมือโดย');   
            $table->string('equipment_calibration_year',255)->nullable()->comment('ปีสอบเทียบเครื่องมือ');    
            $table->unsignedBigInteger('equipment_maintenance_id')->nullable()->comment('การบำรุงรักษา');     
            $table->string('equipment_maintenance_other')->nullable()->comment('การบำรุงรักษาอื่นๆ');           
            $table->bigInteger('equipment_maintenance_budget')->nullable()->comment('ค่าบำรุงรักษา');              
            $table->string('equipment_admin_name', 255)->nullable()->comment('ผู้ดูแลเครื่องมือชื่อ');              
            $table->string('equipment_admin_phone', 255)->nullable()->comment('ผู้ดูแลเครื่องมือเบอร์โทร');           
            $table->string('equipment_admin_email', 255)->nullable()->comment('ผู้ดูแลเครื่องมืออีเมล์');              
            $table->integer('equipment_manual_id')->nullable()->comment('คู่มือเครื่องมือ');                   
            $table->string('equipment_manual_name', 255)->nullable()->comment('ชื่อคู่มือเครื่องมือ');                   
            $table->string('equipment_manual_location', 255)->nullable()->comment('ที่อยู่คู่มือเครื่องมือ');          
            $table->unsignedBigInteger('equipment_rent_id')->nullable()->comment('เช่าใช้เครื่องมือ');          
            $table->string('equipment_rent_fee', 255)->nullable()->comment('ค่าเช่าใช้เครื่องมือ'); 
            $table->string('equipment_rent_detail', 255)->nullable()->comment('รายละเอียดเช่าใช้เครื่องมือ');
            $table->boolean('completed')->default(false); 
            $table->timestamps();
            // note - dont forget to add nullable 

            // Foreign Key to other table
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('lab_id')->references('id')->on('labs');
            $table->foreign('science_tool_id')->references('id')->on('science_tools');                          
            $table->foreign('equipment_usage_id')->references('id')->on('equipment_usages');                  
            $table->foreign('equipment_maintenance_id')->references('id')->on('equipment_maintenances');
        });
        
        // ข้อ 3.10 สาขาเทคโนโลยีเครื่องมือ 
        Schema::create('equipment_major_technology', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('equipment_id');
            $table->unsignedBigInteger('major_technology_id');
            $table->timestamps();
            
            $table->foreign('equipment_id')
                ->references('id')->on('equipments');
            $table->foreign('major_technology_id')
                ->references('id')->on('major_technologies');
        });

        // ข้อ 3.11 วัตถุประสงค์การใช้งาน
        Schema::create('equipment_objective_usage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('equipment_id');
            $table->unsignedBigInteger('objective_usage_id');
            $table->timestamps();
            
            $table->foreign('equipment_id')
                ->references('id')->on('equipments');
            $table->foreign('objective_usage_id')
                ->references('id')->on('objective_usages');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_major_technology');
        Schema::dropIfExists('equipment_objective_usage');
        Schema::dropIfExists('equipments');
    }
}
