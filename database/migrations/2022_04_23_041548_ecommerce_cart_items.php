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
        Schema::create('ecommerce_cart_items', function (Blueprint $table) {
            $table->bigIncrements('cart_items_id');
            $table->integer('client_id');
            $table->integer('client_store_id');

            $table->foreign('client_id')
            ->references('client_id')
            ->on('ecommerce_clients')
            ->onDelete('cascade');

            $table->foreign('client_store_id')
            ->references('client_store_id')
            ->on('ecommerce_client_stores')
            ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ecommerce_cart_items');
    }
};
