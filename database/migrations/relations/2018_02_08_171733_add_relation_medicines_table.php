<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicines', function (Blueprint $table) {
            if(Schema::hasTable('medicines')){
                $table->foreign('medicine_type_id')->references('id')->on('medicine_types')->onDelete('restrict');
                $table->foreign('medicine_category_id')->references('id')->on('medicine_categories')->onDelete('restrict');
                $table->foreign('medicine_manufacturer_id')->references('id')->on('medicine_companies')->onDelete('restrict');
                $table->foreign('medicine_generic_id')->references('id')->on('medicine_generics')->onDelete('restrict');
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
        Schema::table('medicines', function (Blueprint $table) {
            if(Schema::hasTable('medicines')){
                $table->dropForeign('medicines_medicine_type_id_foreign');
                $table->dropForeign('medicines_medicine_category_id_foreign');
                $table->dropForeign('medicines_medicine_manufacturer_id_foreign');
                $table->dropForeign('medicines_medicine_generic_id_foreign');
            }
        });
    }
}
