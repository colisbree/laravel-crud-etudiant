<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->foreignId('classe_id')->constrained('classes');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();  // permet d'activer les contraintes sur les clés étrangères
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        // suppression de la relation avant effacement
        Schema::table('etudiants', function(Blueprint $table) {
            $table->dropConstrainedForeignId('classe_id');
        }); 
        Schema::dropIfExists('etudiants');
    }
};
