<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('mat', 3)->default('Car');
            $table->unsignedBigInteger('user_id')->default(1);
            $table->unsignedBigInteger('themes_id')->default(1);
            $table->unsignedBigInteger('background_image_id')->default(1);
            $table->unsignedBigInteger('text_style_id')->default(1);
            $table->string('title', 100)->default('Example');
            $table->longText('subtitle')->default('Example');
            $table->longText('location')->nullable();
            $table->boolean('large_text')->default(0);
            $table->timestamps();
            $table->softDeletes();


            //foreing key 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  
            $table->foreign('themes_id')->references('id')->on('themes')->onDelete('cascade');
            $table->foreign('background_image_id')->references('id')->on('background_images')->onDelete('cascade');
            $table->foreign('text_style_id')->references('id')->on('text_styles')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('cards');
        Schema::enableForeignKeyConstraints();
        
    }
}
