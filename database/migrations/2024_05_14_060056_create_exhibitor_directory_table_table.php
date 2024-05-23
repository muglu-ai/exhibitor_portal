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

        Schema::create('exhibitor_directory_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exhibitor_id',30);
            $table->string('org_name',250)->nullable();
            $table->string('fascia_name',250)-> nullable();
            $table->string('org_logo')->nullable();
            $table->string('org_profile')->nullable();
            $table->string('update_status',5)->default('0');
            $table->timestamp('created_At')->nullable();
            $table->timestamp('updated_At')->nullable();

            $table->foreign('exhibitor_id')->references('exhibitor_id')->on('exhibitor_reg_table');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exhibitor_directory_table');
    }
};
