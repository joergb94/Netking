<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('mat', 3)->default('MbS');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('type_user_id');
            $table->integer('quantity')->default(1);
            $table->unsignedBigInteger('type_membership_id');
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->date('date_renovation')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('type_user_id')->references('id')->on('type_users')->onDelete('cascade');
            $table->foreign('type_membership_id')->references('id')->on('type_memberships')->onDelete('cascade');
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
        Schema::dropIfExists('memberships');
        Schema::enableForeignKeyConstraints();
    }
}
