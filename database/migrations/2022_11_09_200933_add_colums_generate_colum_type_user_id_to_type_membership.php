<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsGenerateColumTypeUserIdToTypeMembership extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('type_memberships', function (Blueprint $table) {
            $table->unsignedBigInteger('type_user_id')->nullable();
             //foreing key 
             $table->foreign('type_user_id')->references('id')->on('type_users')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('type_memberships', function (Blueprint $table) {
            $table->dropForeign(['type_user_id']);
            $table->dropColumn('type_user_id');   
        });
    }
}
