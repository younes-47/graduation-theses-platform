<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('etudiants')->insert([
            'nom'=>'elfard',
            'prenom'=>'zakaria',
            'date_naissance'=>'2002-06-03',
            'ville_naissance'=>'Rabat',
            'filiere'=>'genie informatique'
            
        ]);
    }
}
