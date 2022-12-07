<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicineOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('offer_name',200);
            $table->tinyInteger('offer_percent');
            $table->enum('offer_highlight',['yes','no'])->default('yes');
            $table->date('offer_start');
            $table->date('offer_end');
            $table->enum('offer_status', ['running','end'])->default('running');
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
        Schema::dropIfExists('medicine_offers');
    }
}
