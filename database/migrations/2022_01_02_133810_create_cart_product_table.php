<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_product', function (Blueprint $table) {
            $table->foreignId('cart_id');
            $table->foreignId('product_id');
            $table->smallInteger('quantity')->unsigned()->default(1);

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->cascadeOnUpdate()->cascadeOnDelete();

            $table->foreign('cart_id')
                ->references('id')->on('cart')
                ->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_product');
    }
}