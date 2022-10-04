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
        
        Schema::create('tagTranslation', function (Blueprint $table) {
            $table->unsignedBiginteger('idTag');
            $table->string('idLanguage');
            $table->string('title');

            $table->primary(['idTag', 'idLanguage']);
            $table->foreign('idTag')->references('id')->on('tag')->onDelete('cascade');
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
        Schema::dropIfExists('tagTranslation');
    }
};
