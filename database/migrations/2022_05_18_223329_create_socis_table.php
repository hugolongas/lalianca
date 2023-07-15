<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surname');
            $table->string('dni');
            $table->date('birth_date');
            $table->integer('mobile');
            $table->longText('address');
            $table->string('city');
            $table->integer('postal_code');
            $table->string('name_responsable');
            $table->string('type');
            $table->string('iban');
            $table->string('iban_name');
            $table->string('iban_dni');
            $table->boolean('privacy_policy');
            $table->boolean('publicity');
            $table->boolean('comunication');
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
        Schema::dropIfExists('socis');
    }
}
