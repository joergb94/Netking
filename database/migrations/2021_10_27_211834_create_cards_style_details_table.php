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
            $table->boolean('background_color')->default(1);
            $table->boolean('shape_image')->default(0);
            $table->boolean('head_orientation')->default(0);
            $table->boolean('shape')->default(0);
            $table->boolean('outline')->default(0);
            $table->integer('buttons_shape')->default(2);
            $table->integer('divs_shape')->default(1);
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
