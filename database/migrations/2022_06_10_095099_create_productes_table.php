<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nom');
            $table->string('descripcio')->nullable();
            $table->double('preu');
            $table->integer('quantitat');
            $table->unsignedBigInteger('cartegoria_id')->nullable();
            //$table->foreign('cartegoria_id')->references('id')->on('categories')->onDelete('cascade');
        });
        Schema::create('productes_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locale')->index();

            $table->integer('productes_id')->unsigned();
            $table->unique(['productes_id', 'locale']);
            $table->foreign('productes_id')->references('id')->on('productes')->onDelete('cascade');        

            $table->string('nom');
            $table->longText('descripcio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productes');
    }
}
