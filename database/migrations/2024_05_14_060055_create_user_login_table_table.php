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

        Schema::create('user_login_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exhibitor_id',15);
            $table->string('login_email',250);
            $table->foreign('login_email',250)->references('cp_email')->on('exhibitor_reg_table');
            $table->string('password');
            $table->foreign('exhibitor_id')->references('exhibitor_id')->on('exhibitor_reg_table');
            $table->string('captcha',50)->nullable();
            $table->string('status', 1)->default(('1'));
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
        Schema::dropIfExists('user_login_table');
    }
};
