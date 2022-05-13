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
        Schema::create('ecommerce_stores', function (Blueprint $table) {
            $table->bigIncrements('store_id');
            $table->string('name_store');
            $table->string('logo_store');
            $table->string('favicon_store');
            $table->string('email_store');
            $table->string('phone_store');
            $table->string('country_store');
            $table->string('city_store');
            $table->string('state_store');
            $table->string('zip_store');
            $table->string('street_store');
            $table->enum('currency_store',['TND','USD','EUR']);
            $table->decimal('tax_percentage_store',4,2);
            $table->string('term_use_link_store');
            $table->string('policy_link_store');
            $table->string('qr_code_store')->default('null');
            $table->enum('status_store',['open','closed'])->default('open');
            $table->integer('admin_id');

            $table->foreign('admin_id')
            ->references('admin_id')
            ->on('ecommerce_admins')
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
        Schema::dropIfExists('ecommerce_stores');
    }
};
