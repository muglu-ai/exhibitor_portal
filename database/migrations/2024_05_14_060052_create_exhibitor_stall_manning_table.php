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
            $table->string('sm1_title',30)->nullable();
            $table->string('sm1_fname',250)->nullable();
            $table->string('sm1_lname',250)->nullable();
            $table->string('sm1_email',250)->nullable();
            $table->string('sm1_designation',250)->nullable();
            $table->string('sm1_mobile',15)->nullable();
            $table->string('sm1_govt_id_type',250)->nullable();
            $table->string('sm1_govt_id_number',250)->nullable();

            $table->string('sm2_title',30)->nullable();
            $table->string('sm2_fname',250)->nullable();
            $table->string('sm2_lname',250)->nullable();
            $table->string('sm2_email',250)->nullable();
            $table->string('sm2_designation',250)->nullable();
            $table->string('sm2_mobile',15)->nullable();
            $table->string('sm2_govt_id_type',250)->nullable();
            $table->string('sm2_govt_id_number',250)->nullable();

            $table->string('sm3_title',30)->nullable();
            $table->string('sm3_fname',250)->nullable();
            $table->string('sm3_lname',250)->nullable();
            $table->string('sm3_email',250)->nullable();
            $table->string('sm3_designation',250)->nullable();
            $table->string('sm3_mobile',15)->nullable();
            $table->string('sm3_govt_id_type',250)->nullable();
            $table->string('sm3_govt_id_number',250)->nullable();

            $table->string('sm4_title',30)->nullable();
            $table->string('sm4_fname',250)->nullable();
            $table->string('sm4_lname',250)->nullable();
            $table->string('sm4_email',250)->nullable();
            $table->string('sm4_designation',250)->nullable();
            $table->string('sm4_mobile',15)->nullable();
            $table->string('sm4_govt_id_type',250)->nullable();
            $table->string('sm4_govt_id_number',250)->nullable();

            $table->string('sm5_title',30)->nullable();
            $table->string('sm5_fname',250)->nullable();
            $table->string('sm5_lname',250)->nullable();
            $table->string('sm5_email',250)->nullable();
            $table->string('sm5_designation',250)->nullable();
            $table->string('sm5_mobile',15)->nullable();
            $table->string('sm5_govt_id_type',250)->nullable();
            $table->string('sm5_govt_id_number', 250)->nullable();
            $table->timestamp('created_At')->nullable();
            $table->timestamp('updated_At')->nullable();
            $table->foreign('exhibitor_id')->references('exhibitor_id')->on('exhibitor_reg_details');
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
