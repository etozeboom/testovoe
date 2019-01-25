<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permission_role', function (Blueprint $table) {
            //
            
           $table->integer('role_id')->unsigned()->default(1);
           $table->foreign('role_id')->references('id')->on('roles');
            
           $table->integer('doors_id')->unsigned()->default(1);
           $table->foreign('doors_id')->references('id')->on('doors');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}