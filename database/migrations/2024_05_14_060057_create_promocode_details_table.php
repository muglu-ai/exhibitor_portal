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

        Schema::create('promocode_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('promocode_organization')->index(); // Adding index to the column
            $table->string('promo_code')->nullable();
            $table->string('exhibitor_count')->nullable();
            $table->string('delegate_count')->nullable();
            $table->string('discount')->nullable();
            $table->string('total_count')->nullable();
            $table->string('total_used')->nullable();
            $table->string('remaining')->nullable();
            $table->timestamp('created_At')->nullable();
            $table->timestamp('updated_At')->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promocode_details');
    }
};
