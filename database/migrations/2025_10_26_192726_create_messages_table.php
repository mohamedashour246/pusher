<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('sender',false,true);
            $table->foreign('sender')->references('id')->on('users');

            $table->bigInteger('receiver',false,true);
            $table->foreign('receiver')->references('id')->on('users');

            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
