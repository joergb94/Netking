<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendsGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends_groups', function (Blueprint $table) {
            $table->id();
            $table->string('mat', 3)->default('Fri');
            $table->unsignedBigInteger('friend_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->unsignedTinyInteger('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
             //foreing key 
             $table->foreign('friend_id')->references('id')->on('friends')->onDelete('cascade'); 
             $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade'); 
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends_groups');
    }
}
