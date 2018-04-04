<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            if(Schema::hasTable('order_details')){
                $table->foreign('order_id')->references('id')->on('orders')->onDelete('restrict');
            }
            if(Schema::hasTable('medicines')){
                $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('restrict');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            if(Schema::hasTable('order_details')){
                $table->dropForeign('order_details_order_id_foreign');
            }
            if(Schema::hasTable('medicines')){
                $table->dropForeign('medicines_medicine_id_foreign');
            }
        });
    }
}
