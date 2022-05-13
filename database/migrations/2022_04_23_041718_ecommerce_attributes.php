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
        Schema::create('ecommerce_attributes', function (Blueprint $table) {
            $table->bigIncrements('attribute_id');
            $table->string('name_attribute');
            $table->string('values_attribute');
            $table->enum('optional_attribute',['0','1']);
            $table->enum('multiselect_attribute',['0','1']);
            $table->enum('status_attribute',['active','disabled']);

            $table->integer('store_id');
            $table->integer('admin_id');

            $table->foreign('store_id')
            ->references('store_id')
            ->on('ecommerce_stores')
            ->onDelete('cascade');

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
        Schema::dropIfExists('ecommerce_attributes');
    }
};
