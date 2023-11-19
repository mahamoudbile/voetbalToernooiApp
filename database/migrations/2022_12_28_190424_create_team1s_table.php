<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team1s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained();
            $table->string('name');
            $table->unsignedBigInteger('won')->default(0);
            $table->unsignedBigInteger('draw')->default(0);
            $table->unsignedBigInteger('lost')->default(0);
            $table->unsignedBigInteger('goals_for')->default(0);
            $table->unsignedBigInteger('goals_against')->default(0);
            $table->unsignedBigInteger('pts')->default(0);
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
        Schema::dropIfExists('team1s');
    }
};
