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
        Schema::create('ecommerce_products', function (Blueprint $table) {
            $table->bigIncrements('product_id');

            $table->string('name_porduct',255);
            $table->string('description_product');
            $table->decimal('original_price_product',10,3);
            $table->decimal('sell_price_product',10,3);
            $table->boolean('taxable_product')->default(false);
            $table->integer('stock_item_product');

            $table->enum('stock_prevent_purchase_product',['0','1']);
            $table->integer('attribute_ids_product'); //references attributes
            $table->time('preparation_time_product');
            $table->string('purchase_note_product');
            $table->string('thumbnail_product');
            $table->string('featured_images_product');
            $table->integer('sales_count_product');
            $table->integer('visit_count_product');
            $table->enum('status_product',['show','hide'])->default('show');
            $table->integer('store_id');
            $table->integer('category_id');
            $table->integer('sub_category_id');

            $table->foreign('store_id')
            ->references('store_id')
            ->on('ecommerce_stores')
            ->onDelete('cascade');

            $table->foreign('category_id')
            ->references('category_id')
            ->on('ecommerce_categories')
            ->onDelete('cascade');

            $table->foreign('sub_category_id')
            ->references('sub_category_id')
            ->on('ecommerce_sub_categories')
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
        Schema::dropIfExists('ecommerce_products');
    }
};
