<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TypeUserTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::dropIfExists('type_users');
        Schema::create('type_users', function (Blueprint $table) {
            $table->id();
            $table->string('mat', 3)->default('TyU');
            $table->string('name', 30)->nullable();
            $table->integer('max_cards')->default(1);
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
        Schema::dropIfExists('type_users');
        Schema::enableForeignKeyConstraints();
        
    }
}
