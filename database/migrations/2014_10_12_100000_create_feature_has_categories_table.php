<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureHasCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_has_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feature_id')
                ->constrained('features', 'id')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreignId('category_id')
                ->constrained('categories', 'id')
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
        Schema::dropIfExists('feature_has_categories');
    }
}
