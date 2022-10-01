<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_codes', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_code');
            $table->string('coupon_type');
            $table->integer('discount');
            $table->string('coupon_status');
            $table->timestamps('valid_from');
            $table->timestamps('end_date');
            $table->string('usage_allowed');
            $table->string('limit_per_customer');
            $table->integer('minimum_apply_value');
            $table->string('apply_on_specific_category');
            $table->string('apply_on_specific_brand');
            $table->string('show_on_cart_page');
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
        Schema::dropIfExists('coupon_codes');
    }
}
