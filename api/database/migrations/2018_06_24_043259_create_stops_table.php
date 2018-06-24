<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('age')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('gender')->nullable();
            $table->string('legislation')->nullable();
            $table->string('datetime')->nullable();
            $table->string('type')->nullable();
            $table->string('search')->nullable();
            $table->string('forces');
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
        Schema::dropIfExists('stops');
    }
}
