@extends('dashboard')

@section('titre', 'Soutenance - Programmation')

@section('content')
    <br>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-900">Programmer la soutenance</h1>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
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

<form method="POST" action="programmerSoutenance/{{ $projets->id }}" class="form-horizontal"
    enctype="multipart/form-data">
    <div class="row">


        <div class="form-group">
            @csrf
            <label class="col-md-4 control-label text-gray-800">Nom d'etudiant</label>
            <div class="col-md-4">
                <select class="form-control" aria-label="Default select example" name="nom">
                    <option value="{{ $projets->nom_etudiant }}">{{ $projets->nom_etudiant }}</option>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Prénom d'etudiant</label>
            <div class="col-md-4">
                <select class="form-control" aria-label="Default select example" name="prenom">
                    <option value="{{ $projets->prenom_etudiant }}">{{ $projets->prenom_etudiant }}</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Sujet de PFE</label>
            <div class="col-md-4">
                <select class="form-control" aria-label="Default select example" name="">
                    <option value="{{ $projets->nom_projet }}">{{ $projets->nom_projet }}</option>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Date de soutenance</label>
            <div class="col-md-4">
                <input type="date" placeholder="Date de soutenance" class="form-control input-md"
                    name="date_soutenance" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">L'heure</label>
            <div class="col-md-4">
                <input type="time" placeholder="Heure de soutenance" class="form-control input-md"
                    name="heure_soutenance" />
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">N° Salle</label>
            <div class="col-md-4">
                <select class="form-control" aria-label="Default select example" name="num_salle" id="option-select">
                    <option selected disabled>--Choisir la salle--</option>
                    <option value="Salle 1">Salle 1</option>
                    <option value="Salle 2">Salle 2</option>
                    <option value="Salle 3">Salle 3</option>
                    <option value="Salle 4">Salle 4</option>
                    <option value="Salle 5">Salle 5</option>
                    <option value="Salle 6">Salle 6</option>
                    <option value="Salle 7">Salle 7</option>
                    <option value="Salle 8">Salle 8</option>
                    <option value="Salle 9">Salle 9</option>
                    <option value="Salle informatique 1">Salle informatique 1</option>
                    <option value="Salle informatique 1">Salle informatique 2</option>
                    <option value="Amphi 1">Amphi 1</option>
                    <option value="Amphi 2">Amphi 2</option>

                </select>
            </div>

        </div>


        <div class="form-group">
            <label class="col-md-4 control-label text-gray-800">Encadrant</label>
            <div class="col-md-4">
                <select class="form-control" aria-label="Default select example" name="encadrant">
                    <option selected disabled>--Choisir Encadrant--</option>
                    @foreach ($juries as $jury)
                        <option value="{{ $jury->num_jury }}">{{ $jury->nom }} {{ $jury->prenom }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="clone" style="display: none;">
            <div class="duplicate">
                <div class="form-group">

                    <label class="col-md-4 control-label text-gray-800">Membre de Jury</label>
                    <div class="col-md-4">
                        <select class="form-control" aria-label="Default select example" name="membre_jury[]">
                            <option selected disabled>--Choisir Membre de jury--</option>
                            @foreach ($juries as $jury)
                                <option value="{{ $jury->num_jury }}">{{ $jury->nom }} {{ $jury->prenom }}
                                </option>
                            @endforeach
                        </select>
                        <button type="button" id="remove" class="btn btn-supprimer"
                            style="float: right; background-color: red; color: white">supprimer</button>
                    </div>

                </div>

            </div>
        </div>

        <div class="container bouton-dyal-ajout" style="float: left;">
            <button type="button" class="btn btn-ajouter" style="background-color: orange; color: white"><i
                    class="bi bi-plus-circle"></i> ajouter membre
                de jury</button>
            <br><br>
        </div>

        <div class="form-group">
            <div class="col-md-4">
                <button type="submit" class="btn btn-outline-success">Enregistrer</button>
                <a href="/listeProjet" class="btn btn-outline-primary">Annuler</a>
            </div>
        </div>
        <br><br>
    </div>
</form>
<br><br><br><br>

<script>
    $(document).ready(function() {
        $(".btn-ajouter").click(function() {
            var inputHtml = $(".clone").html();
            $(".bouton-dyal-ajout").after(inputHtml);
        })
    });

    $("body").on("click", ".btn-supprimer", function() {
        if (confirm('Voulez-vous vraiment supprimer ce membre de jury?')) {
            $(this).parents(".duplicate").remove();
        };
    })
</script>
@endsection
