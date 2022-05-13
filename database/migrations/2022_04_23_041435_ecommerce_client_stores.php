<?php

use Brick\Math\BigInteger;
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
        Schema::create('ecommerce_client_stores', function (Blueprint $table) {
            $table->bigIncrements('client_store_id');
            $table->integer('product_count_client_store');
            $table->string('attribute_info_product');
            $table->integer('client_id');
            $table->integer('store_id');

            $table->foreign('store_id')
            ->references('store_id')
            ->on('ecommerce_stores')
            ->onDelete('cascade');

            $table->foreign('client_id')
            ->references('client_id')
            ->on('ecommerce_clients')
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
        Schema::dropIfExists('ecommerce_client_stores');
    }
};
