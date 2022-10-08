<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('parent_id')->nullable(true);
            $table->bigInteger('category_level')->nullable(true);
            $table->string('status');
            $table->string('home_banner_img');
            $table->string('cover_img');
            $table->string('description')->nullable(true);
            $table->string('title');
            $table->string('url_slug')->nullable(true);
            $table->string('tags')->nullable(true);
            $table->string('meta_description')->nullable(true);
            $table->integer('sort_order');
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
        Schema::dropIfExists('categories');
    }
}
