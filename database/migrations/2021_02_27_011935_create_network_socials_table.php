<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetworkSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('network_socials', function (Blueprint $table) {
            $table->id();
            $table->string('mat', 3)->default('NeS');
            $table->string('name');
            $table->string('icon');
            $table->string('link');
            $table->string('btn_network');
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('network_socials');
        Schema::enableForeignKeyConstraints();
    }
}
