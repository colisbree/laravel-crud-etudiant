<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index(){
        $etudiants = Etudiant::orderBy("nom", "asc")->paginate(10);
        return view("etudiant", compact("etudiants"));
    }

    public function create(){
        $classes = Classe::all();
        return view("createEtudiant", compact("classes"));
    }

    public function edit(Etudiant $etudiant){
        $classes = Classe::all();
        return view("editEtudiant", compact("etudiant","classes"));
    }

    public function store(Request $request){
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "classe_id"=>"required"
        ]);

        // 1ère possibilité d'insertion d'un nouvel étudiant
        // avec la variable $fillable dans model pour savoir quoi insérer
        //Etudiant::create($request->all());

        // 2ème possibilité d'insertion d'un nouvel étudiant sans la variable $fillable
        Etudiant::create([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "classe_id"=>$request->classe_id
        ]);

        return back()->with("success", "Etudiant ajouté avec succès");
    }

    public function delete(Etudiant $etudiant){
        $nom_complet = $etudiant->nom." ".$etudiant->prenom;
        $etudiant->delete();

        return back()->with("successDelete", "L'étudiant '$nom_complet' a été supprimé avec succès");
    }

    public function update(Request $request, Etudiant $etudiant){
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "classe_id"=>"required"
        ]);

        // 1ère possibilité d'insertion d'un nouvel étudiant
        // avec la variable $fillable dans model pour savoir quoi insérer
        //Etudiant::create($request->all());

        // 2ème possibilité d'insertion d'un nouvel étudiant sans la variable $fillable
        $etudiant->update([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "classe_id"=>$request->classe_id
        ]);

        return back()->with("success", "Etudiant mis à jour avec succès");
    }
}
