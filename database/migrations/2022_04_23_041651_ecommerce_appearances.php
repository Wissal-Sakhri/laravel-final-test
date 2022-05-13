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
        Schema::create('ecommerce_appearances', function (Blueprint $table) {
            $table->bigIncrements('appearance_id');
            $table->enum('product_sort_appearance',['name','new','price','sale','random'])->default('name');
            $table->enum('product_listing_appearance',['list','grid'])->default('list');
            $table->string('theme_color_appearance',10)->nullable(false);
            $table->enum('hide_add_to_cart_appearance',['0','1'])->default('0');
            $table->enum('hide_buy_now_appearance',['0','1'])->default('0');
            $table->integer('store_id');

            $table->foreign('store_id')
            ->on('ecommerce_stores')
            ->references('store_id');

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
        Schema::dropIfExists('ecommerce_appearances');
    }
};
