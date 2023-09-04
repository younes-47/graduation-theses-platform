@extends('dashboard')

@section('content')
    <br>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-900">Modifier Soutenance</h1>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>



    <form class="form-horizontal" enctype="multipart/form-data" method="POST"
        action="modifierSoutenance/{{ $soutenances->id }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">

            @csrf
            <div class="form-group">
                <label class="col-md-4 control-label text-gray-800">Numero de salle</label>
                <div class="col-md-4">
                    <select class="form-control" aria-label="Default select example" name="num_salle" id="option-select">
                        <option selected value="{{ $soutenances['num_salle'] }}">
                            {{ $soutenances['num_salle'] }}</option>
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
                <label class="col-md-4 control-label text-gray-800">La Date de la Soutenance</label>
                <div class="col-md-4">
                    <input type="date" placeholder="Date de soutenance" class="form-control input-md" name="date_soutenance"
                        value="{{ $soutenances['date_soutenance'] }}" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label text-gray-800">L'heure de la Soutenance</label>
                <div class="col-md-4">
                    <input type="time" placeholder="Heure de soutenance" class="form-control input-md"
                        name="heure_soutenance" value="{{ $soutenances['heure_soutenance'] }}" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label text-gray-800">L'encadrant</label>
                <div class="col-md-4">
                    <select class="form-control" aria-label="Default select example" name="encadrant" id="option-select">
                        <option selected value="{{ $encadrant->num_jury }}">{{ $encadrant->nom }}
                            {{ $encadrant->prenom }}</option>
                        @foreach ($juries as $jury)
                            @if ($jury->num_jury == $encadrant->num_jury)
                                @continue
                            @endif
                            <option value="{{ $jury->num_jury }}">{{ $jury->nom }} {{ $jury->prenom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label text-gray-800">Les membres de Jury</label>
                <div class="col-md-4">
                    <table class="table table-bordered table-warning">
                        <thead>
                            <tr class="text-gray-800">
                                <th style="width:55%">Nom et Prénom</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($membres as $membre)
                                @php
                                    $info_membre = App\Models\Jury::where('num_jury', $membre->num_jury)
                                        ->get('*')
                                        ->first();
                                @endphp
                                <tr>
                                    <td class="text-gray-700"><strong>{{ $info_membre->nom }}
                                            {{ $info_membre->prenom }}</strong></td>
                                    <td>
                                        @if ($membre->num_jury != $soutenances['encadrant'])
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $membre->num_jury }}" name="old_membre_jury[]"
                                                    id="supprimer">
                                                <label class="form-check-label text-danger" for="supprimer">
                                                    <strong>Enlever</strong>
                                                </label>
                                            </div>
                                        @else
                                            <p class="text-gray-900"><i><strong>(Encadrant)</strong></i></p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group">
                <div class="clone" style="display: none;">
                    <div class="duplicate">
                        <label class="col-md-4 control-label text-gray-800">Membre de Jury</label>
                        <div class="col-md-4">
                            <select class="form-control" aria-label="Default select example" name="new_membre_jury[]">
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

                <div class="container bouton-dyal-ajout" style="float: left;">
                    <button type="button" class="btn btn-ajouter" style="background-color: orange; color: white"><i
                            class="bi bi-plus-circle"></i> ajouter membre
                        de jury</button>
                    <br><br>
                </div>

            </div>
        </div>


        <div class="form-group">
            <div class="col-md-4">
                <button type="submit" class="btn btn-outline-success">Modifier</button>
                <a href="/listeSoutenance" class="btn btn-primary">Annuler</a>
            </div>
        </div>

        </div>
    </form>

    <br><br><br>


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
