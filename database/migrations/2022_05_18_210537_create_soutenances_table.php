<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoutenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soutenances', function (Blueprint $table) {
            $table->id();
            $table->string('nom_etudiant');
            $table->string('prenom_etudiant');
            $table->string('num_etd');
            $table->string('nom_projet');
            $table->text('num_salle');
            $table->date('date_soutenance');
            $table->string('heure_soutenance');
            $table->string('encadrant');
            $table->double('note_finale')->nullable();
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
        Schema::dropIfExists('soutenances');
    }
}
