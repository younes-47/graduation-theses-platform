<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('num_etd');
            $table->string('nom_projet');
            $table->string('nom_etudiant');
            $table->string('prenom_etudiant');
            $table->string('filiere_etudiant');
            $table->string('etat')->nullable(); // null = ba9i admin madar walo, non = refusé, oui = accepté
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
        Schema::dropIfExists('projets');
    }
}
