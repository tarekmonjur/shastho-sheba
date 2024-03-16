<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_no', 20);
            $table->bigInteger('user_id')->unsigned();
            $table->string('order_city');
            $table->string('order_area');
            $table->string('contact_person');
            $table->string('contact_mobile');
            $table->string('prescription_image')->nullable();
            $table->enum('order_status', ['pending', 'accepted', 'undelivered', 'delivered', 'completed', 'cancel'])->default('pending');
            $table->enum('payment_status', ['pending', 'completed'])->default('pending');
            $table->decimal('total_actual_amount', '10', '2')->default(0.00);
            $table->decimal('total_discount', '10', '2')->default(0.00);
            $table->decimal('total_discount_amount', '10', '2')->default(0.00);
            $table->decimal('vat_amount', '10', '2')->default(0.00);
            $table->decimal('delivery_fee', '10', '2')->default(0.00);
            $table->decimal('processing_fee', '10', '2')->default(0.00);
            $table->decimal('total_payable_amount', '10', '2')->default(0.00);
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
        Schema::dropIfExists('orders');
    }
}
