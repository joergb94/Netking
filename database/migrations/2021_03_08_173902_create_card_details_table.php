<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_id')->nullable();
            $table->unsignedBigInteger('card_item_id')->nullable();
            $table->string('mat', 3)->default('CaD');
            $table->string('name', 100)->default('Example');
            $table->integer('order')->default(0);
            $table->longText('description')->default('ExampleDescription');
            $table->json('item_data')->nullable();
            $table->integer('size')->default(12);
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes();

             //foreing key 
             $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
             $table->foreign('card_item_id')->references('id')->on('cards_items')->onDelete('cascade');  
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
        Schema::dropIfExists('card_details');
        Schema::enableForeignKeyConstraints();
    }
}
