<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weblogblogs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('title');
            $table->longText('blog');
            $table->text('comment')->nullable();
           // $table->string('categories')->nullable();
            $table->boolean('premium')->nullable()->default(0);
            $table->text('photoname')->nullable();
            $table->bigInteger('writer_id')->unsigned();
            $table->foreign('writer_id')->references('id')->on('users');
            $table->text('foto_comment')->nullable();

        });


     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weblogblogs');
        //Schema::dropIfExists('categories');
    }

    
}


