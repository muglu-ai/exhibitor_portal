<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exhibitor_stall_manning', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exhibitor_id',30);
            $table->string('org_name',250)->nullable();
            $table->string('sm1_name',250)->nullable();
            $table->string('sm1_email',250)->nullable();
            $table->string('sm1_designation',250)->nullable();
            $table->string('sm1_mobile',15)->nullable();
            //sm1_govt_id_type and sm1_govt_id_number are added
            $table->string('sm1_govt_id_type',250)->nullable();
            $table->string('sm1_govt_id_number',250)->nullable();

            $table->string('sm2_name',250)->nullable();
            $table->string('sm2_email',250)->nullable();
            $table->string('sm2_designation',250)->nullable();
            $table->string('sm2_mobile',15)->nullable();
            //sm2_govt_id_type and sm2_govt_id_number are added
            $table->string('sm2_govt_id_type',250)->nullable();
            $table->string('sm2_govt_id_number',250)->nullable();
            $table->string('sm3_name',250)->nullable();
            $table->string('sm3_email',250)->nullable();
            $table->string('sm3_designation',250)->nullable();
            $table->string('sm3_mobile',15)->nullable();
            //sm3_govt_id_type and sm3_govt_id_number are added
            $table->string('sm3_govt_id_type',250)->nullable();
            $table->string('sm3_govt_id_number',250)->nullable();
            $table->string('sm4_name',250)->nullable();
            $table->string('sm4_email',250)->nullable();
            $table->string('sm4_designation',250)->nullable();
            $table->string('sm4_mobile',15)->nullable();
            //sm4_govt_id_type and sm4_govt_id_number are added
            $table->string('sm4_govt_id_type',250)->nullable();
            $table->string('sm4_govt_id_number',250)->nullable();
            $table->string('sm5_name',250)->nullable();
            $table->string('sm5_email',250)->nullable();
            $table->string('sm5_designation',250)->nullable();
            $table->string('sm5_mobile',15)->nullable();
            //sm5_govt_id_type and sm5_govt_id_number are added
            $table->string('sm5_govt_id_type',250)->nullable();
            $table->string('sm5_govt_id_number', 250)->nullable();
            $table->timestamp('created_At')->nullable();
            $table->timestamp('updated_At')->nullable();
            $table->foreign('exhibitor_id')->references('exhibitor_id')->on('exhibitor_reg_table');
        });
    }

    // $table->string('exhibitor_id',15);
    //generate exhibitor id with a given format on insert into table
    // $table->string('exhibitor_id', 15)->default(function () {
    //     return 'exh_' . date('Y') . '_' . rand();
    // });

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exhibitor_stall_manning');
    }
};
