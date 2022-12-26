
@extends('layouts.master')

@section('contenu')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-4">Ajouter un étudiant</h3>
        
        <div class="mt-4">

            @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li class="ms-4">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form style="width:35%" method="POST" action="{{ route('etudiant.ajouter') }}">
                @csrf
                <div class="form-group mt-2">
                    <label for="nomEtudiant">Nom de l'étudiant</label>
                    <input type="text" class="form-control" id="nomEtudiant" name="nom" aria-describedby="" placeholder="Entrer le nom de l'étudiant" required>
                </div>
                <div class="form-group  mt-2">
                    <label for="prenomEtudiant">Prénom de l'étudiant</label>
                    <input type="text" class="form-control" id="prenomEtudiant" name="prenom" aria-describedby="" placeholder="Entrer le prénom de l'étudiant" required>
                </div>
                <div class="form-group  mt-2">
                    <label for="classeEtudiant">Classe de l'étudiant</label>
                    <select type="text" class="form-control" id="classeEtudiant" name="classe_id" aria-describedby="" required>
                        <option value=""></option>
                        @foreach ($classes as $classe)
                            <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary mt-2">Enregistrer le nouvel étudiant</button>
                <a href="{{ route('etudiant') }}" class="btn btn-warning mt-2">Annuler</a>
            </form>
        </div>
    </div>
@endsection