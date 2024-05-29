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
            $table->string('sm_title',30)->nullable();
            $table->string('sm_fname',250)->nullable();
            $table->string('sm_lname',250)->nullable();
            $table->string('sm_email',250)->nullable();
            $table->string('sm_designation',250)->nullable();
            $table->string('sm_mobile',15)->nullable();
            $table->string('sm_govt_id_type',250)->nullable();
            $table->string('sm_govt_id_number',250)->nullable();
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
