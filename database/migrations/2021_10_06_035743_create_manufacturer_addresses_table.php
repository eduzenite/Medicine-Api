<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufacturerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturer_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manufacturer_id')->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->unsignedBigInteger('address_id')->foreign('address_id')->references('id')->on('addresses');
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
        Schema::dropIfExists('manufacturer_addresses');
    }
}
