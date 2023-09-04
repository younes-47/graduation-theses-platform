@extends('dashboard')

@section('content')
    <br>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-900">Modifier les informations de l'étudiant</h1>
    </div>


    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="modifierEtudiant/{{ $etudiants->id }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            @csrf

            <label class="col-md-4 control-label text-gray-800">Nom d'etudiant</label>
            <div class="col-md-4">
                <input type="text" placeholder="Prenom du client" class="form-control input-md" name="nom"
                    value="{{ $etudiants['nom'] }}" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Prénom d'etudiant</label>
            <div class="col-md-4">
                <input type="text" placeholder="Prenom du client" class="form-control input-md" name="prenom"
                    value="{{ $etudiants['prenom'] }}" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Date de naissance</label>
            <div class="col-md-4">
                <input type="date" placeholder="Date de naissance" class="form-control input-md" name="date_naissance"
                    value="{{ $etudiants['date_naissance'] }}" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Adresse</label>
            <div class="col-md-4">
                <input type="text" placeholder="Adresse" class="form-control input-md" name="adresse"
                    value="{{ $etudiants['adresse'] }}" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">N°Telephone</label>
            <div class="col-md-4">
                <input type="number" placeholder="N°Telephone" class="form-control input-md" name="num_telephone"
                    value="{{ $etudiants['num_telephone'] }}" />
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Filière</label>
            <div class="col-md-4">

                <select class="form-control" aria-label="Default select example" name="filiere" id="option-select">
                    <option selected value="{{ $etudiants['filiere'] }}">{{ $etudiants['filiere'] }}</option>
                    <option value="Génie Informatique">Génie Informatique</option>
                    <option value="Electronique Embarquée pour l'automobile">Electronique Embarquée pour l'automobile
                    </option>
                    <option value="Logistique et Transport">Logistique et Transport</option>
                    <option value="Informatique Industrielle et Systèmes Automatisés">Informatique Industrielle et Systèmes
                        Automatisés</option>
                    <option value="Technologies Agro-Alimentaires">Technologies Agro-Alimentaires</option>
                    <option value="Techniques de Management">Techniques de Management</option>
                    <option value="Qualité Industrielle">Qualité Industrielle</option>
                    <option value="Techniques Douanières et Logistique Internationale">Techniques Douanières et Logistique
                        Internationale</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Numero d'etudiant</label>
            <div class="col-md-4">
                <input type="text" placeholder="Numero d'etudiant" class="form-control input-md" name="num_etd"
                    value="{{ $etudiants['num_etd'] }}" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label text-danger">Le mot de passe d'étudiant (champs facultatif)</label><br>
            <label class="col-md-4 control-label text-gray-600"> <i>(si l'étudiant a perdu l'accès à son compte)</i>
            </label>
            <div class="col-md-4">
                <input type="password" placeholder="Mot de passe..." class="form-control input-md" name="new_pass_etd" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800"></label>
            <div class="col-md-4">
                <button type="submit" class="btn btn-outline-success">Modifier</button>
                <a href="/listeEtudiant" class="btn btn-primary">Annuler</a>
            </div>
        </div>

    </form>
@endsection
