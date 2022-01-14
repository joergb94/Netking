<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeCardDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_card_details', function (Blueprint $table) {
            $table->id();
            $table->string('mat', 3)->default('TCD');
            $table->string('name', 100)->nullable();
            $table->string('icon', 100);
            $table->longText('description')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('type_card_details');
        Schema::enableForeignKeyConstraints();
    }
}
