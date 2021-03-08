<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNetworkSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_network_socials', function (Blueprint $table) {
            $table->id();
            $table->string('mat', 3)->default('UNS');
            $table->unsignedBigInteger('network_social_id')->nullable();
            $table->string('url', 255)->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();


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
        Schema::dropIfExists('user_network_socials');
        Schema::enableForeignKeyConstraints();
    }
}
