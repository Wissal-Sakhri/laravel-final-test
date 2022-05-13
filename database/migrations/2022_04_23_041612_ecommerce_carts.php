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
        Schema::create('ecommerce_carts', function (Blueprint $table) {
            $table->bigIncrements('cart_id');
            $table->decimal('tax_cart',4,2);
            $table->string('coupon_code_cart');
            $table->enum('coupon_type_cart',[0,1]);
            $table->decimal('discount_cart',4,2);
            $table->decimal('payement_amount_cart',20,3);
            $table->enum('currency_cart',['TND','USD','EUR']);
            $table->string('delivery_note_cart');
            $table->enum('store_pickup_cart',[0,1]);
            $table->string('pickup_point_details_cart');
            $table->enum('status_cart',['pending','approved','rejected','cancelled','confirmed']);
            $table->string('admin_notes_cart');
            $table->integer('cart_items_id');
            $table->integer('client_id');
            $table->integer('store_id');
            $table->dateTime('ordered_at');
            $table->dateTime('paid_at');

            $table->foreign('cart_items_id')
            ->references('cart_items_id')
            ->on('ecommerce_cart_items')
            ->onDelete('cascade');

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
        Schema::dropIfExists('ecommerce_carts');
    }
};
