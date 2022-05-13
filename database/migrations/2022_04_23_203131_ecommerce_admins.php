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
        Schema::create('ecommerce_admins', function (Blueprint $table) {
            $table->bigIncrements('admin_id');
            $table->string('name_admin');
            $table->string('email_admin');
            $table->string('phone_admin');
            $table->string('password_admin');
            $table->string('address_admin');
            $table->enum('status_admin',['0','1'])->default('1');
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
        Schema::dropIfExists('ecommerce_admins');
    }
};
