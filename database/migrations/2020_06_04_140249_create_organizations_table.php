<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('');
            $table->unsignedBigInteger('user_id')->comment(''); //รหัสผู้ใช้งานระบบ
            $table->string('org_name')->comment('ชื่อหน่วยงาน'); //1.1
            $table->string('org_name_level_1')->nullable()->comment('');
            $table->string('org_name_level_2')->nullable()->comment('');
            $table->string('org_code')->comment('รหัสหน่วยงาน'); //1.2
            $table->string('org_number')->nullable()->comment('หมายเลขประจำหน่วยงาน'); //1.3
            $table->string('org_building')->nullable()->comment('อาคาร'); //1.4
            $table->string('org_floor')->nullable()->comment('ชั้น'); 
            $table->string('org_address')->comment('เลขที่');
            $table->string('org_soi')->nullable()->comment('ซอย'); 
            $table->string('org_road')->nullable()->comment('ถนน'); 
            $table->integer('province_info_ch_id')->comment('จังหวัด'); 
            $table->integer('province_info_am_id')->comment('เขต/อำเภอ'); 
            $table->integer('province_info_ta_id')->comment('แขวง/ตำบล'); 
            $table->integer('org_postcode')->comment('รหัสไปรษณีย์'); 
            $table->string('org_phone')->nullable()->comment('โทรศัพท์');
            $table->string('org_fax')->nullable()->comment('โทรสาร'); 
            $table->string('org_email')->nullable()->comment('อีเมล');
            $table->string('org_website')->nullable()->comment('เว็บไซต์');
            $table->string('org_lat')->nullable()->comment('ละติจูด');
            $table->string('org_long')->nullable()->comment('ลองจิจูด');
            $table->bigInteger('org_capital')->nullable()->comment('ทุนจดทะเบียน'); //1.5 
            $table->integer('org_employee_amount')->nullable()->comment('จำนวนบุคลากร'); //1.6
            $table->unsignedBigInteger('organisation_type_id'); //1.8
            $table->string('organisation_type_other')->nullable();
            $table->unsignedBigInteger('business_type_id'); //1.9
            $table->string('business_type_other')->nullable(); //1.9
            $table->string('industrial_type_other')->nullable(); //1.10
            $table->text('quality_system_other')->nullable(); //1.11
            $table->boolean('completed')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('organisation_type_id')->references('id')->on('organisation_types'); //1.8
            $table->foreign('business_type_id')->references('id')->on('business_types'); //1.9
        });

        
        // 1.7 การจำหน่าย/ส่งออกสินค้า/บริการ : เลือกได้มากกว่า 1 คำตอบ 
        Schema::create('organization_sale_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('organization_id');
            $table->unsignedBigInteger('sale_product_id');
            $table->timestamps();
            
            $table->foreign('organization_id')
                ->references('id')->on('organizations');
            $table->foreign('sale_product_id')
                ->references('id')->on('sale_products');
        });

        // 1.7 ส่งออกต่างประเทศ : เลือกได้มากกว่า 1 คำตอบ
        Schema::create('country_organization', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('organization_id');
            $table->timestamps();
            
            $table->foreign('country_id')
                ->references('id')->on('countries');
            $table->foreign('organization_id')
                ->references('id')->on('organizations');
        });
        
        // 1.10 ประเภทอุตสาหกรรม : เลือกได้มากกว่า 1 คำตอบ
        Schema::create('industrial_type_organization', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('industrial_type_id');
            $table->unsignedBigInteger('organization_id');
            $table->timestamps();
            
            $table->foreign('industrial_type_id')
                ->references('id')->on('industrial_types');
            $table->foreign('organization_id')
                ->references('id')->on('organizations');
        });

        // 1.11
        Schema::create('quality_system_iso9000s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('org_id')->comment('');
            $table->unsignedBigInteger('operation_id')->nullable()->comment('');
            $table->string('scoped')->nullable()->comment('');
            $table->string('certification_agency')->nullable()->comment('');
            $table->string('accredited')->nullable()->comment('');
            $table->timestamps();

            $table->foreign('org_id')
                ->references('id')->on('organizations');
            $table->foreign('operation_id')
                ->references('id')->on('operations');
        });
        Schema::create('quality_system_iso14000s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('org_id')->comment('');
            $table->unsignedBigInteger('operation_id')->nullable()->comment('');
            $table->string('scoped')->nullable()->comment('');
            $table->string('certification_agency')->nullable()->comment('');
            $table->string('accredited')->nullable()->comment('');
            $table->timestamps();

            $table->foreign('org_id')
                ->references('id')->on('organizations');
            $table->foreign('operation_id')
                ->references('id')->on('operations');
        });
        Schema::create('quality_system_iso_haccps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('org_id')->comment('');
            $table->unsignedBigInteger('operation_id')->nullable()->comment('');
            $table->string('scoped')->nullable()->comment('');
            $table->string('certification_agency')->nullable()->comment('');
            $table->string('accredited')->nullable()->comment('');
            $table->timestamps();

            $table->foreign('org_id')
                ->references('id')->on('organizations');
            $table->foreign('operation_id')
                ->references('id')->on('operations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organization_sale_product');
        Schema::dropIfExists('country_organization');
        Schema::dropIfExists('industrial_type_organization');
        Schema::dropIfExists('quality_system_iso9000s');
        Schema::dropIfExists('quality_system_iso14000s');
        Schema::dropIfExists('quality_system_iso_haccps');
        Schema::dropIfExists('organizations');
    }
}
