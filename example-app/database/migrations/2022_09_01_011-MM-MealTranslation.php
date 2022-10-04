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
        
        Schema::create('mealTranslation', function (Blueprint $table) {
            $table->unsignedBiginteger('idMeal');
            $table->string('idLanguage');
            $table->string('title');
            $table->text('description')->nullable();

            $table->primary(['idMeal', 'idLanguage']);
            $table->foreign('idMeal')->references('id')->on('meal')->onDelete('cascade');
            $table->foreign('idLanguage')->references('slug')->on('language')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mealTranslation');
    }
};
