<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicineCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('medicine_company_name', 100);
            $table->string('medicine_company_address');
            $table->enum('medicine_company_status', ['active','inactive'])->default('active');
            $table->string('medicine_company_slug');
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
        Schema::dropIfExists('medicine_companies');
    }
}
