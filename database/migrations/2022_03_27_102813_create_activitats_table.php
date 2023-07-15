<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activitats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');            
            $table->string('resume');
            $table->longText('description');
            $table->integer('category_id');            
            $table->date('date');
            $table->time('time');            
            $table->string('price');            
            $table->string('buy_url');
            $table->string('img');            
            $table->boolean('published');
            $table->string('url')->nullable();
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
        Schema::dropIfExists('activitats');
    }
}
