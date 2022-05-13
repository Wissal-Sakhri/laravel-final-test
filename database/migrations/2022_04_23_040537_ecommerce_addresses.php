<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecommerce_addresses', function (Blueprint $table) {
            $table->bigIncrements('id_address');
            $table->string('country_address');
            $table->string('city_address');
            $table->string('state_address');
            $table->string('street_address');
            $table->string('zip_address');
            $table->string('longitude_address');
            $table->string('latitude_address');
            $table->integer('client_id');
            $table->integer('store_id');

            $table->foreign('client_id')
            ->references('client_id')
            ->on('ecommerce_clients')
            ->onDelete('cascade');

            $table->foreign('store_id')
            ->references('store_id')
            ->on('ecommerce_stores')
            ->onDelete('cascade');
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
        Schema::dropIfExists('addresses');
    }
};
