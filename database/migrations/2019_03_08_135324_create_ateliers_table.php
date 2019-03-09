<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAteliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ateliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre');
            $table->string('slug');
            $table->text('description');
            $table->date('date_atelier');
            $table->time('horaire_debut');
            $table->time('duree');
            $table->integer('nb_place_dispo')->unsigned()->default(0);
            $table->integer('nb_place_reserve')->unsigned()->default(0);
            $table->float('prix',6,2);
            $table->string('image');
            $table->boolean('visible')->unsigned()->default(0);
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
        Schema::dropIfExists('ateliers');
    }
}
