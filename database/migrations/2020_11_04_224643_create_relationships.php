<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subcategories', function ($table)
        {
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade');
        });

        Schema::table('products', function ($table)
        {
            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('cascade');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onUpdate('cascade');
        });

        Schema::table('promotions', function ($table)
        {
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade');
        });

        Schema::table('order_product', function ($table)
        {
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade');
        });

        Schema::table('detail_payment', function ($table)
        {
            $table->foreign('method_payment_id')->references('id')->on('method_payments')->onUpdate('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade');
        });

        Schema::table('orders', function ($table)
        {
            $table->foreign('person_id')->references('id')->on('persons')->onUpdate('cascade');
        });

        Schema::table('users', function ($table)
        {
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade');
        });
         Schema::table('persons', function ($table)
        {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationships');
    }
}













