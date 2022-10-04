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
        
        Schema::create('ingredients', function (Blueprint $table) {
            $table->unsignedBiginteger('idMeal');
            $table->unsignedBiginteger('idIngredient');

            $table->primary(['idMeal', 'idIngredient']);
            $table->foreign('idMeal')->references('id')->on('meal')->onDelete('cascade');
            $table->foreign('idIngredient')->references('id')->on('ingredient')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
};
