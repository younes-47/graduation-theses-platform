@extends('/etudiant-panel/template')


@section('titre', 'Consulter votre soutenance!')

@section('content')
    <br>
    <div class="text-center text-gray-800">
        <h1>Bienvenue @foreach ($nom_complet as $smia)
                <strong>{{ $smia->nom }} {{ $smia->prenom }}</strong>
            @endforeach
        </h1>
    </div>

    <br>
<br>

    @if (empty($khtar))
{{-- Ba9i ma khtar --}}

        <div class="container alert alert-warning" style="width: 900px;">
            <h5 style="letter-spacing: 1px; padding-top:30px; text-align:center;"><strong>Vous n'avez pas encore choisi un
                    sujet de votre PFE</strong></h5>
            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px; padding-top:20px; text-align:center;">
                <strong>Veuillez choisissez votre sujet du projet PFE</strong>
            </h5>
        </div>

        <form action="/choix" method="POST">
            @csrf
            <div class="form-outline container" style="padding-top:40px ;width: 800px;">
                <input type="text" id="form2Example17" class="form-control form-control-lg" name="projet" />
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br>
                <button type="submit" class="btn btn-success btn-lg">Choisir</button>
            </div>
        </form>
        <br>
        <hr>
        <div class="container" style="width: 700px;">
            <div class="text-center text-gray-800">
                <h5>Voici la liste des sujets déjà choisis par autre étudiants de {{$filiere}}</h5>
                <br>
            </div>

            @if ($sujets->count() != 0)
                <ul class="list-group">
                    @foreach ($sujets as $sujet)
                        <li class="list-group-item list-group-item-secondary">{{ $sujet['nom_projet'] }}</li>
                    @endforeach
                </ul>
            @else
                <div class="alert alert-info text-center">
                    <p><i>(Aucun sujet choisi)</i></p>
                </div>
            @endif
        </div>
    @elseif (!empty($khtar)  && $khtar->etat == null)
        {{-- ba9i admin madar walo --}}
        <div class="container alert alert-info" style="width: 900px;">
            <h5 style="letter-spacing: 1px; text-align:center; font-size: 3rem;"><strong><i class="bi bi-info-circle"></i></strong></h5>
            <h5 style="letter-spacing: 1px; padding-top:30px; text-align:center;"><strong>Votre sujet choisi est en cours
                    d'examen par l'administration</strong></h5>
            <h5 style="letter-spacing: 1px; padding-top:30px; text-align:center;"><strong>Toutes les informations à
                propos votre soutenance seront affichées ici une fois que l'administration aura approuvé votre sujet</strong></h5>
            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px; padding-top:20px; text-align:center;">
                <strong>Merci pour votre patience</strong>
            </h5>
        </div>
    @elseif(!empty($khtar) && $khtar->etat == 'oui')
        {{-- sujet accepté --}}
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-4 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center">Votre Encadrant</h6>
                        </div>
                        <div class="card-body">

                                <p class="text-center text-gray-900" style="font-size: x-large"><strong>Pr {{ $encadrant->nom }} {{ $encadrant->prenom }}</strong></p>
                                <p class="text-center text-gray-800 alert alert-info">Email: <strong>{{ $email }}</strong></p>

                        </div>
                    </div>

                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center">Date & Lieu de votre soutenance</h6>
                        </div>
                        <div class="card-body">
                            <p class="text-center text-gray-900" style="font-size: xx-large"><strong>{{ \Carbon\Carbon::parse($soutenance->date_soutenance)->format('d/m/Y') }} à {{$soutenance->heure_soutenance}}</strong></p>
                            <p class="text-center text-success text-gray-900" style="font-size: large"><strong>{{$soutenance->num_salle}}</strong></p>
                            <hr>
                            @if ( \Carbon\Carbon::now() > \Carbon\Carbon::parse($soutenance->date_soutenance))
                            <p class="mb-0 text-center alert alert-warning">Vous avez déjà passé votre soutenance</p>
                            @else
                            <p class="mb-0 text-center alert alert-info"><strong>Il vous reste {{ \Carbon\Carbon::parse($soutenance->date_soutenance)->diffInDays(\Carbon\Carbon::now()) }} jours</strong></p>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center">Sujet et la note</h6>
                        </div>
                        <div class="card-body">

                                <p class="text-center text-gray-800" style="font-size: medium"><strong>{{ $soutenance->nom_projet }}</strong></p>
                                <hr>
                                @if($soutenance->note_finale == null)
                                    <p class="alert alert-danger text-center">Pas encore noté</p>
                                @else
                                    <p class="alert alert-success text-center">La note final: <strong>{{ $soutenance->note_finale }}</strong></p>
                                @endif


                        </div>
                    </div>

                </div>

            </div>
        </div>
    @elseif (!empty($khtar) && $khtar->etat == 'non')
        {{-- sujet refusé --}}
        <div class="container alert alert-danger" style="width: 900px;">
            <h5 style="letter-spacing: 1px; padding-top:30px; text-align:center;"><strong>Votre sujet de PFE que vous avez
                    déjà choisi
                    a été refusé par l'administration.</strong></h5>
            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px; padding-top:20px; text-align:center;">
                <strong>Veuillez choisir un autre sujet de votre PFE</strong>
            </h5>
        </div>

        <form action="/choix" method="POST">
            @csrf
            <div class="form-outline container" style="padding-top:40px ;width: 800px;">
                <input type="text" id="form2Example17" class="form-control form-control-lg" name="projet" />
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br>
                <button type="submit" class="btn btn-success btn-lg">Choisir</button>
            </div>
        </form>
        <br>
        <hr>
        <div class="container" style="width: 700px;">
            <div class="text-center text-gray-800">
                <h5>Voici la liste des sujets déjà choisis par autre étudiants de {{$filiere}}</h5>
                <br>
            </div>
            
            @if ($sujets->count() != 0)
                <ul class="list-group">
                    @foreach ($sujets as $sujet)
                        <li class="list-group-item list-group-item-secondary">{{ $sujet['nom_projet'] }}</li>
                    @endforeach
                </ul>
            @else
                <div class="alert alert-info text-center">
                    <p><i>(Aucun sujet choisi)</i></p>
                </div>
            @endif

        </div>
    @endif


@endsection
