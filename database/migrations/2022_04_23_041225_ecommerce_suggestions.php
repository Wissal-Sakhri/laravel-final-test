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
        Schema::create('ecommerce_suggestions', function (Blueprint $table) {
            $table->bigIncrements('suggestion_id');
            $table->integer('product_id');
            $table->integer('store_id');

            $table->foreign('product_id')
            ->references('product_id')
            ->on('ecommerce_products')
            ->onDelete('cascade');

            $table->foreign('store_id')
            ->references('store_id')
            ->on('ecommerce_stores')
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
        Schema::dropIfExists('ecommerce_suggestions');
    }
};
