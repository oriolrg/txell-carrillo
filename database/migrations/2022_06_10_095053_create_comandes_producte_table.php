<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComandesProducteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comandes_producte', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comanda_id')->nullable();
            $table->unsignedBigInteger('producte_id')->nullable();
            $table->integer('quantitat');
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
        Schema::dropIfExists('comandes_producte');
    }
}
