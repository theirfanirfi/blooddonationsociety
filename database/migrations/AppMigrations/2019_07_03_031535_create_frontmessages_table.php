<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrontmessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontmessages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('message');
            $table->string('image');
            $table->integer('designation')->nullable(); //1 for society chairman 2 for principal
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
        Schema::dropIfExists('frontmessages');
    }
}
