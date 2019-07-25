<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Gallery', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image_title');
            $table->string('image_description');
            $table->string('image_url');
            $table->bigInteger('user_id')->unsigned()->default(0);
            $table->timestamps();
            //$table->foreign('user_id')->on('id')->references('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Gallery');
    }
}
