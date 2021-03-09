<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardDetailNetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_detail_networks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_id')->nullable();
            $table->unsignedBigInteger('network_social_id')->nullable();
            $table->string('mat', 3)->default('CDN');
            $table->string('name', 100)->nullable();
            $table->longText('url')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        
             //foreing key 
             $table->foreign('network_social_id')->references('id')->on('network_socials')->onDelete('cascade');  
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
        Schema::dropIfExists('card_detail_networks');
        Schema::enableForeignKeyConstraints();
    }
}
