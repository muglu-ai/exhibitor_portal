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
        Schema::disableForeignKeyConstraints();

        Schema::create('delegate_personal_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exhibitor_id',30)->nullable();
            $table->string('delegate_id',30)->nullable();
            $table->string('tin_no',30)->nullable();
            $table->string('del_title',30)->nullable();
            $table->string('del_fname',250)->nullable();
            $table->string('del_lname',250)->nullable();
            $table->string('del_email',250)->nullable();
            $table->string('del_designation',250)->nullable();
            $table->string('del_contact',15)->nullable();
            $table->string('del_type',250)->nullable();
            $table->string('del_govtid_type', 25)->nullable();
            $table->string('del_govtid_no', 50)->nullable();
            $table->string('del_org_category', 50)->nullable();
            $table->foreign('exhibitor_id')->references('exhibitor_id')->on('exhibitor_reg_details');
            $table->foreign('delegate_id')->references('delegate_id')->on('delegate_org_details');
            // $table->foreign('tin_no')->references('delegate_id')->on('delegate_org_details');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delegate_personal_info');
    }
};
