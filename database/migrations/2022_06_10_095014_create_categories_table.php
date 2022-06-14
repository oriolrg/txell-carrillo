<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nom');
            $table->string('descripcio')->nullable();
        });
        Schema::create('categories_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locale')->index();

            $table->integer('categories_id')->unsigned();
            $table->unique(['categories_id', 'locale']);
            //$table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');        

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
        Schema::dropIfExists('categories');
    }
}
