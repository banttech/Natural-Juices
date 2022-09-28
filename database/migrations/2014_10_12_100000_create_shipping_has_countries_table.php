<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingHasCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_has_countries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipping_category_id')
                ->constrained('shipping_categories', 'id')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreignId('country_id')
                ->constrained('countries', 'id')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
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
        Schema::dropIfExists('shipping_has_countries');
    }
}
