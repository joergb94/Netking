<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsStyleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards_style_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_id')->nullable();
            $table->string('shape_image')->nullable();
            $table->string('orientation')->nullable();
            $table->integer('size')->default(50);
            $table->boolean('outline')->default(0);
            $table->timestamps();
            $table->softDeletes();

             //foreing key 
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
        Schema::dropIfExists('cards_style_details');
    }
}
