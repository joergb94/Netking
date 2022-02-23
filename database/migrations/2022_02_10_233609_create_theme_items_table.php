<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemeItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theme_id')->nullable();
            $table->unsignedBigInteger('item_id')->nullable();
            $table->longText('name')->nullable();
            $table->integer('order')->default(0);
            $table->longText('description')->nullable();
            $table->longText('item_data')->nullable();
            $table->integer('size')->default(12);
            $table->boolean('active')->default(1);
            $table->timestamps();
            
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('cards_items')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theme_items');
    }
}
