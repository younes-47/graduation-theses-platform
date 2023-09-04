@extends('dashboard')


@section('content')
<br>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-900">Ajouter nouveau étudiant</h1>
</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @break
            @endforeach
        </ul>
    </div>
@endif
</div>


<form method="POST" action="ajouterEtudiant" class="form-horizontal" enctype="multipart/form-data">
    <div class="row">


        <div class="form-group">
            @csrf
            <label class="col-md-4 control-label text-gray-800">Nom d'etudiant</label>
            <div class="col-md-4">
                <input type="text" placeholder="Nom d'etudiant" class="form-control input-md" name="nom" />
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Prénom d'etudiant</label>
            <div class="col-md-4">
                <input type="text" placeholder="Prenom d'etudiant" class="form-control input-md" name="prenom" />
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Date de naissance</label>
            <div class="col-md-4">
                <input type="date" placeholder="Date de naissance" class="form-control input-md" name="date_naissance" />
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Adresse</label>
            <div class="col-md-4">
                <input type="text" placeholder="Adresse" class="form-control input-md" name="adresse" />
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">N°Telephone</label>
            <div class="col-md-4">
                <input type="number" placeholder="N°Telephone" class="form-control input-md" name="num_telephone" />
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Filière</label>
            <div class="col-md-4">
                <select class="form-control" aria-label="Default select example" name="filiere" id="option-select">
                    <option selected disabled>--Choisir la filière--</option>
                    <option value="Génie Informatique">Génie Informatique</option>
                    <option value="Electronique Embarquée pour l’automobile">Electronique Embarquée pour l’automobile</option>
                    <option value="Logistique et Transport">Logistique et Transport</option>
                    <option value="Informatique Industrielle et Systèmes Automatisés">Informatique Industrielle et Systèmes Automatisés</option>
                    <option value="Technologies Agro-Alimentaires">Technologies Agro-Alimentaires</option>
                    <option value="Techniques de Management">Techniques de Management</option>
                    <option value="Qualité Industrielle">Qualité Industrielle</option>
                    <option value="Techniques Douanières et Logistique Internationale">Techniques Douanières et Logistique Internationale</option>
                </select>
            </div>
        </div>


        {{-- <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Email</label>
            <div class="col-md-4">
                <input type="email" placeholder="Email" class="form-control input-md" name="email" />
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Mot de passe</label>
            <div class="col-md-4">
                <input type="password" placeholder="Mot de passe" class="form-control input-md" name="password" />
            </div>
        </div> --}}



        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Numero d'etudiant</label>
            <div class="col-md-4">
                <input type="text" placeholder="Numero d'etudiant" class="form-control input-md" name="num_etd" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4">
                <button type="submit" class="btn btn-outline-success">Enregistrer</button>
                <a href="/listeEtudiant" class="btn btn-outline-primary">Annuler</a>
            </div>
        </div>

</form>

</div>
</div>




@endsection