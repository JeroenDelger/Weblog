<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
        });
    
    Schema::create('categorie_weblog', function (Blueprint $table) {
        $table->unsignedBigInteger('weblog_id')->unsinged()->index();
        $table->foreign('weblog_id')->references('id')->on('weblogblogs');
        
        $table->unsignedBigInteger('categorie_id')->unsinged()->index();
        $table->foreign('categorie_id')->references('id')->on('categories');
    
    });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorie_weblog');
        Schema::dropIfExists('categories');
    }
}
//seeders > dummy data