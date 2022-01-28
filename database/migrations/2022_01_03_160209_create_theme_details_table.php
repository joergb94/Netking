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
            $table->unsignedBigInteger('text_style_id')->default(1);
            $table->unsignedBigInteger('background_image_id')->default(1);
            $table->string('background_image_color')->default('#000000');;
            $table->string('color')->nullable();
            $table->string('large_text')->nullable();
            $table->longText('template')->nullable();
            $table->boolean('background_color')->default(0);
            $table->boolean('shape_image')->default(0);
            $table->boolean('head_orientation')->default(0);
            $table->boolean('shape')->default(0);
            $table->boolean('outline')->default(0);
            $table->integer('buttons_shape')->default(2);
            $table->integer('divs_shape')->default(1);
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');
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
        Schema::dropIfExists('theme_details');
        Schema::enableForeignKeyConstraints();
    }
}
