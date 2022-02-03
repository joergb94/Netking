<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mat', 3)->default('Fri');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('user_friend_id')->nullable();
            $table->unsignedBigInteger('card_id')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes();

            //foreing key 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');  
            $table->foreign('user_friend_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends');
    }
}
