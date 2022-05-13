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
        Schema::create('ecommerce_comments', function (Blueprint $table) {
            $table->bigIncrements('comment_id');
            $table->integer('parent_id_comment');
            $table->string('content_comment');
            $table->enum('status_comment',['hidden','visible'])->default('visible');

            $table->integer('product_id');
            $table->integer('client_id');

            $table->foreign('product_id')
            ->references('product_id')
            ->on('ecommerce_products')
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
        Schema::dropIfExists('ecommerce_comments');
    }
};
