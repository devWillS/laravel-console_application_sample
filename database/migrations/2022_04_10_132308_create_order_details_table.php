<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->string('order_code', 32);
            $table->integer('detail_no');
            $table->string('item_name', 100);
            $table->integer('item_price');
            $table->integer('quantity');
            $table->integer('subtotal_price');
            $table->unique(['order_code'], 'UNIQUE_IDX_ORDER_CODE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};
