@extends('dashboard')

@section('content')
    <br>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-900">Modifier les informations du membre de jury</h1>
    </div>

    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="modifierJury/{{ $juries->id }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            @csrf
            <label class="col-md-4 control-label">Nom du jury</label>
            <div class="col-md-4">
                <input type="text" placeholder="Nom du jury" class="form-control input-md" name="nom"
                    value="{{ $juries['nom'] }}" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Prenom du jury</label>
            <div class="col-md-4">
                <input type="text" placeholder="Prenom du client" class="form-control input-md" name="prenom"
                    value="{{ $juries['prenom'] }}" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Grade</label>
            <div class="col-md-4">
                <select class="form-control" aria-label="Default select example" name="grade" id="option-select">
                    <option selected value="{{ $juries['grade'] }}">{{ $juries['grade'] }}</option>

                    <option value="PES">PES</option>
                    <option value="PH">PH</option>
                    <option value="PA">PA</option>

                </select>
            </div>

        </div>

        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Spécialité</label>
            <div class="col-md-4">

                <select class="form-control" aria-label="Default select example" name="specialité" id="option-select">
                    <option selected value="{{ $juries['specialité'] }}">{{ $juries['specialité'] }}</option>
                    <option value="Informatique">Informatique</option>
                    <option value="Informatique Industrielle">Informatique Industrielle</option>
                    <option value="Economie">Economie</option>
                    <option value="Logistique & Transport">Logistique & Transport</option>
                    <option value=">Eléctronique embarquée">Eléctronique embarquée</option>
                    <option value="Technologies Agro-Alimentaires">Technologies Agro-Alimentaires</option>

                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Université</label>
            <div class="col-md-4">

                <select class="form-control" aria-label="Default select example" name="université" id="option-select">
                    <option selected value="{{ $juries['université'] }}">{{ $juries['université'] }}</option>
                    <option value="Université Hassan II - Casablanca">Université Hassan II - Casablanca</option>
                    <option value="Université Abdelmalek Essaadi – Tétouan">Université Abdelmalek Essaadi – Tétouan
                    </option>
                    <option value="Université Mohammed Premier – Oujda">Université Mohammed Premier – Oujda</option>
                    <option value="Université Sultan Moulay Slimane – Beni Mellal">Université Sultan Moulay Slimane – Beni
                        Mellal</option>
                    <option value="Université Sidi Mohammed Ben Abdellah – Fès">Université Sidi Mohammed Ben Abdellah –
                        Fès</option>
                    <option value="Université Moulay Ismaïl – Meknès">Université Moulay Ismaïl – Meknès</option>
                    <option value="Université Ibn Tofail – Kénitra">Université Ibn Tofail – Kénitra</option>
                    <option value="Université Cadi Ayyad – Marrakech">Université Cadi Ayyad – Marrakech</option>
                    <option value="Université Chouaïb Doukkali – El Jadida">Université Chouaïb Doukkali – El Jadida</option>
                    <option value="Université Hassan I – Settat">Université Hassan I – Settat</option>
                    <option value="Université Mohammed V – Rabat">Université Mohammed V – Rabat</option>
                    <option value="Université Ibn Zohr – Agadir">Université Ibn Zohr – Agadir</option>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Etablissement</label>
            <div class="col-md-4">
                <input type="text" placeholder="Etablissement" class="form-control input-md" name="etablissement"
                    value="{{ $juries['etablissement'] }}" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Numero de Jury</label>
            <div class="col-md-4">
                <input type="text" placeholder="Numero de Jury" class="form-control input-md" name="num_jury"
                    value="{{ $juries['num_jury'] }}" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label text-danger">Le mot de passe de membre de jury (champs
                facultatif)</label><br>
            <label class="col-md-4 control-label text-gray-600"> <i>(si le membre de jury a perdu l'accès à son compte)</i>
            </label>
            <div class="col-md-4">
                <input type="password" placeholder="Mot de passe..." class="form-control input-md" name="new_pass_jury" />
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">
                <button type="submit" class="btn btn-outline-success">Modifier</button>
                <a href="/listeJury" class="btn btn-primary">Annuler</a>
            </div>
        </div>

    </form>
    <br><br><br>
@endsection
