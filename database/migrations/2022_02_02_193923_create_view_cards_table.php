<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('view_cards', function (Blueprint $table) {
            $table->id();
            $table->string('mat', 3)->default('VC');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('card_id')->nullable();
            $table->integer('type')->default(1);
            $table->timestamps();

            //foreing key 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_cards');
    }
}
