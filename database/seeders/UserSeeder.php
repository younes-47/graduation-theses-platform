<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        DB::table('users')->insert([
            
            'email'=>'admin@uit.ac.ma',
            'role' => '2',
            'password'=>Hash::make('admin2022'),
            'user_id'=>'A0'
        ]);

        //gha bach ntestiw wach middleware khadam ola la
        // DB::table('users')->insert([
            
        //     'email'=>'etudiant@est.com',
        //     'role' => '0',
        //     'password'=>Hash::make('etudiant123'),
        //     'user_id'=>'etd123456'
        // ]);

        // DB::table('users')->insert([
           
        //     'email'=>'jury@est.com',
        //     'role' => '1',
        //     'password'=>Hash::make('jury123'),
        //     'user_id'=>'jury123456'
        // ]);
    }
}
