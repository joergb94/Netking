<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublcationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publcations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mat', 3)->default('Pub');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('user_network_social_id')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes();

            //foreing key 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  
            $table->foreign('user_network_social_id')->references('id')->on('user_network_socials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publcations');
    }
}
