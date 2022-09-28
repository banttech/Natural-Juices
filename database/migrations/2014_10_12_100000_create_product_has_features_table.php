<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductHasFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_has_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
                ->constrained('products', 'id')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreignId('feature_id')
                ->constrained('features', 'id')
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
        Schema::dropIfExists('product_has_features');
    }
}
