<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theme_id')->nullable();
            $table->string('mat', 3)->default('ThD');
            $table->unsignedBigInteger('text_style_id')->nullable();
            $table->string('template')->nullable();
            $table->timestamps();
            
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');
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
        Schema::dropIfExists('theme_details');
        Schema::enableForeignKeyConstraints();
    }
}
