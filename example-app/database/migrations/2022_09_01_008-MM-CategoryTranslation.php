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
        
        Schema::create('categoryTranslation', function (Blueprint $table) {
            $table->unsignedBiginteger('idCategory');
            $table->string('idLanguage');
            $table->string('title');

            $table->primary(['idCategory', 'idLanguage']);
            $table->foreign('idCategory')->references('id')->on('category')->onDelete('cascade');
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
        Schema::dropIfExists('categoryTranslation');
    }
};
