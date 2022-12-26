<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = ["nom","prenom","classe_id"]; //permet l'ajout d'un nouvel étudiant

    public function classe(){
        return $this->belongsTo(Classe::class);
    }
}
