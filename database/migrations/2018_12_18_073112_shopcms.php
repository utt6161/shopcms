<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopCMS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('price');
            $table->string('image');
            $table->timestamp('created_at');
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id')->default(str_random(20));
            $table->string('product_name');
            $table->string('price');
            $table->string('quantity');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->timestamp('created_at');
        });

        Schema::create('feedback', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('feedback');
            $table->timestamp('created_at');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('feedback');
    }
}
