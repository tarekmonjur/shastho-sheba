<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('medicine_id')->unsigned();
            $table->string('medicine_name');
            $table->string('medicine_code');
            $table->string('medicine_type');
            $table->enum('unit', ['box', 'strip', 'single']);
            $table->smallInteger('quantity');
            $table->decimal('price',8,2)->default(0.00);
            $table->decimal('discount',8,2)->default(0.00);
            $table->decimal('discount_price',8,2)->default(0.00);
            $table->decimal('total_price',8,2)->default(0.00);
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
        Schema::dropIfExists('order_details');
    }
}
