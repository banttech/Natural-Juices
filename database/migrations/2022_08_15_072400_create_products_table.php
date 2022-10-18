<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable(true);
            $table->string('prod_name')->nullable(true);
            $table->string('prod_status')->nullable(true);
            $table->string('prod_category')->nullable(true);
            $table->string('prod_brand')->nullable(true);
            $table->integer('reg_sel_price')->nullable(true);
            $table->integer('prod_discount')->nullable(true);
            $table->string('prod_discount_type')->nullable(true);
            $table->integer('final_sel_price')->nullable(true);
            $table->integer('prod_weight')->nullable(true);
            $table->integer('prod_manual_discount')->nullable(true);
            $table->integer('prod_stock_unit')->nullable(true);
            $table->integer('prod_subsciption_discount')->nullable(true);
            $table->string('prod_subscription_discount_type')->nullable(true);
            $table->integer('prod_subscription_final_sel_price')->nullable(true);
            $table->string('prod_faq')->nullable(true);
            $table->string('prod_description')->nullable(true);
            $table->string('prod_supplements_facts')->nullable(true);
            $table->string('prod_directions')->nullable(true);
            $table->string('prod_suitable_for')->nullable(true);
            $table->string('pack_name')->nullable(true);
            $table->string('pack_manual_discount')->nullable(true);
            $table->integer('pack_quantity')->nullable(true);
            $table->integer('pack_selling_price')->nullable(true);
            $table->integer('pack_discount')->nullable(true);
            $table->string('pack_discount_type')->nullable(true);
            $table->integer('pack_final_sel_price')->nullable(true);
            $table->integer('pack_subscription_discount')->nullable(true);
            $table->integer('pack_subscription_discount_type')->nullable(true);
            $table->integer('pack_subscription_fin_sel_price')->nullable(true);
            $table->string('pack_images')->nullable(true);
            $table->string('product_features_status')->nullable(true);
            $table->string('features')->nullable(true);
            $table->string('seo_title')->nullable(true);
            $table->string('meta_description')->nullable(true);
            $table->string('url_slug')->nullable(true);
            $table->string('seo_tags')->nullable(true);
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
        Schema::dropIfExists('products');
    }
}
