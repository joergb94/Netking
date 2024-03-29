<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('mat', 3)->default('Use');
            $table->unsignedBigInteger('type_user_id')->default(5);
            $table->string('nickname')->nullable();
            $table->longText('name')->nullable();
            $table->longText('occupation')->nullable();
            $table->string('phone')->nullable();
            $table->string('street')->nullable();
            $table->string('email',90)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('extra_cards')->default(0);
            $table->string('image')->nullable();
            $table->string('path')->nullable();
            $table->rememberToken();
            $table->unsignedTinyInteger('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
             //foreing key 
             $table->foreign('type_user_id')->references('id')->on('type_users')->onDelete('cascade'); 
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
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
}
