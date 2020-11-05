<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->String('title')->nullable();
            $table->longText('text')->nullable(); 
            $table->String('image')->nullable(); //url of the image
            $table->String('type')->nullable();
            $table->unsignedBigInteger('user_id');
            
            $table->boolean('public')->default(true); //set the post to be public as default
            $table->boolean('archive')->default(false); 
            
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('posts');
    }
}
