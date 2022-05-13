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
        Schema::create('ecommerce_clients', function (Blueprint $table) {
            $table->bigIncrements('client_id');
            $table->string('subscribe_id');
            $table->string('first_name_client');
            $table->string('last_name_client');
            $table->string('email_client');
            $table->string('password_client');

            $table->integer('store_id');

            $table->foreign('store_id')->references('store_id')->on('ecommerce_stores')->onDelete('cascade');
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
        Schema::dropIfExists('ecommerce_clients');
    }
};
