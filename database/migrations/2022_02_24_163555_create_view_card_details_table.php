<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewCardDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('view_card_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('card_id')->nullable();
            $table->unsignedBigInteger('card_detail_id')->nullable();
            $table->unsignedBigInteger('card_detail_network_id')->nullable();
            $table->timestamps();
            
             //foreing key 
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  
             $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');  
             $table->foreign('card_detail_id')->references('id')->on('card_details')->onDelete('cascade');
             $table->foreign('card_detail_network_id')->references('id')->on('card_detail_networks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_card_details');
    }
}
