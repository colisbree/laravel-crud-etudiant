<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            ['libelle'=>'6ème'],
            ['libelle'=>'5ème'],
            ['libelle'=>'4ème'],
            ['libelle'=>'3ème'],
            ['libelle'=>'seconde'],
            ['libelle'=>'première'],
            ['libelle'=>'terminale']
        ]);
    }
}
