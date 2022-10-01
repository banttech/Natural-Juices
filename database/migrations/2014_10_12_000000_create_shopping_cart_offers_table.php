<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCartOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_cart_offers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('minimum_cart_value');
            $table->string('discount_type');
            $table->integer('discount');
            $table->timestamps('valid_from');
            $table->timestamps('end_date');
            $table->string('status');
            $table->string('description');
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
        Schema::dropIfExists('shopping_cart_offers');
    }
}
