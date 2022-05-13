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
        Schema::create('ecommerce_sub_categories', function (Blueprint $table) {
            $table->bigIncrements('sub_category_id');
            $table->string('name_subcategory');
            $table->string('thumbnail_subcategory');
            $table->enum('status_subcategory',['active','inactive']);
            $table->integer('store_id');
            $table->integer('category_id');

            $table->foreign('category_id')
            ->references('category_id')
            ->on('ecommerce_categories');

            $table->foreign('store_id')
            ->references('store_id')
            ->on('ecommerce_stores');

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
        Schema::dropIfExists('ecommerce_sub_categories');
    }
};
