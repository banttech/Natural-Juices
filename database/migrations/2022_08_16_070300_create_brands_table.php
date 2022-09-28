<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status');
            $table->string('home_logo');
            $table->string('cover_img');
            $table->foreignId('category_id')
                ->constrained('categories', 'id')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->string('description');
            $table->string('title');
            $table->string('meta_description');
            $table->string('url_slug');
            $table->string('tags');
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
        Schema::dropIfExists('brands');
    }
}
