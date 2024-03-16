<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('medicine_type_id')->unsigned();
            $table->bigInteger('medicine_category_id')->unsigned();
            $table->integer('medicine_manufacturer_id')->unsigned();
            $table->bigInteger('medicine_generic_id')->unsigned();
            $table->string('medicine_code',100);
            $table->string('medicine_name',200);
            $table->string('medicine_slug');
            $table->enum('medicine_stock', ['yes', 'no'])->default('yes');
            $table->string('medicine_power', 50);
            $table->decimal('medicine_price', 10,2)->default(0.0);
            $table->tinyInteger('medicine_unit_per_box')->default(0);
            $table->tinyInteger('medicine_unit_per_strip')->default(0);
            $table->string('medicine_image')->nullable();
            $table->date('medicine_manufacture_date')->nullable();
            $table->date('medicine_expiry_date')->nullable();
            $table->enum('medicine_is_new', ['yes','no'])->default('no');
            $table->enum('medicine_is_active', ['yes','no'])->default('yes');
            $table->text('medicine_side_effect')->nullable();
            $table->text('medicine_description')->nullable();
            $table->text('medicine_cashback')->nullable();
            $table->text('medicine_note')->nullable();
            $table->integer('created_by')->default(0);
            $table->integer('updated_by')->default(0);
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
        Schema::dropIfExists('medicines');
    }
}
