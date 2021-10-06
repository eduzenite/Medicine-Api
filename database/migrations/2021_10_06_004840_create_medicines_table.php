<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('active_ingredient_id')->nullable()->foreign('active_ingredient_id')->references('id')->on('active_ingredients');
            $table->unsignedBigInteger('manufacturer_id')->nullable()->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->string('name');
            $table->string('short_name', 150);
            $table->string('slug');
            $table->unsignedBigInteger('category_id')->nullable()->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicines');
    }
}
