<?php

// database/migrations/create_countries_table.php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
public function up()
{
Schema::create('countries', function (Blueprint $table) {
$table->id();
$table->string('name');
$table->string('code')->unique();
$table->timestamps();
});
}

public function down()
{
Schema::dropIfExists('countries');
}
}
