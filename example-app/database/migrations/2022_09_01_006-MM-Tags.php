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
        
        Schema::create('tags', function (Blueprint $table) {
            $table->unsignedBiginteger('idMeal');
            $table->unsignedBiginteger('idTag');

            $table->primary(['idMeal', 'idTag']);
            $table->foreign('idMeal')->references('id')->on('meal')->onDelete('cascade');
            $table->foreign('idTag')->references('id')->on('tag')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
};
