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
        
        Schema::create('ingredientTranslation', function (Blueprint $table) {
            $table->unsignedBiginteger('idIngredient');
            $table->string('idLanguage');
            $table->string('title');

            $table->primary(['idIngredient', 'idLanguage']);
            $table->foreign('idIngredient')->references('id')->on('ingredient')->onDelete('cascade');
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
        Schema::dropIfExists('ingredientTranslation');
    }
};
