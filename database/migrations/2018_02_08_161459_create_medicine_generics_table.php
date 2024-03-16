<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicineGenericsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_generics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('generic_name');
            $table->text('precaution')->nullable();
            $table->text('indication')->nullable();
            $table->text('contraindication')->nullable();
            $table->text('dose')->nullable();
            $table->text('side_effect')->nullable();
            $table->text('mode_of_action')->nullable();
            $table->text('interaction')->nullable();
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
        Schema::dropIfExists('medicine_generics');
    }
}
