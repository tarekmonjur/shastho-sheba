<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            if(Schema::hasTable('admins')){
                $table->foreign('role_id')->references('id')->on('role_permissions')->onDelete('restrict');
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
        Schema::table('admins', function (Blueprint $table) {
            if(Schema::hasTable('admins')){
                $table->dropForeign('admins_role_id_foreign');
            }
        });
    }
}
