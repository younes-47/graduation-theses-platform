@extends('templates/main')

@section('titre', 'Gestionnaire des soutenances PFE')

@section('content')

<!-- Masthead-->
        <header class="masthead" style="background-image: url('{{ asset('img/bg-masthead1.jpg') }}');">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <!-- Page heading-->
                            <h1 class="mb-5">Votre Platforme en ligne pour accéder et gérer les soutenances PFE ...</h1>
                            
                        </div>
                    </div>
                </div>
            </div>
        </header>

        
        
@php
    $soutenances = \App\Models\Soutenance::all();
@endphp

        <section class="bg-light">
            <br><br>
            <div class="container">
                <div class="row">
                    <div class="text-center mb-5 mb-lg-0 mb-lg-3">
                    <h3>Tableau des soutenances des étudiants</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered myTable" width="100%">
                            <thead>
                                <tr>
                                    <th>Nom Complet</th>
                                    <th>Filière</th>
                                    <th>La date de soutenance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($soutenances as $soutenance)
                                @php
                                   $filiere =  \App\Models\Etudiant::where('num_etd', $soutenance->num_etd)->value('filiere');
                                @endphp
                                <tr>
                                    <td>{{$soutenance->nom_etudiant}} {{$soutenance->prenom_etudiant}}</td>
                                    <td>{{$filiere}}</td>
                                    <td>{{ \Carbon\Carbon::parse($soutenance->date_soutenance)->format('d-m-Y') }} à {{$soutenance->heure_soutenance}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

<!-- Icons Grid-->
        <section class="features-icons bg-light text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-box-arrow-in-right m-auto text-primary"></i></div>
                            <h3>Un accès facile</h3>
                            <p class="lead mb-0">s'authentifier avec vos infos donnés par l'administration!</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-card-checklist m-auto text-primary"></i></div>
                            <h3>Choisir votre sujet</h3>
                            <p class="lead mb-0">Vous pouvez voir les sujets choisis par autre étudiants de votre filière, puis décider de choisir un sujet convenable</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-calendar-date m-auto text-primary"></i></div>
                            <h3>Les dates de soutenances</h3>
                            <p class="lead mb-0">Voir la date exacte de votre soutenance à l'avance! ainsi qu'autre details à propos votre soutenance</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<!-- les images -->
        {{-- <section class="showcase">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('{{ asset('img/students.jpg') }}')"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Section dédiée aux étudiants</h2>
                        <p class="lead mb-0">Connectez-vous avec vos informations fournis par l'administration et voir les sujets proposés, la date de votre soutenance et la note obtenue!</p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 text-white showcase-img" style="background-image: url('{{ asset('img/jury.jpg') }}')"></div>
                    <div class="col-lg-6 my-auto showcase-text">
                        <h2>Section dédiée aux membres de jury</h2>
                        <p class="lead mb-0">Voir toutes les soutenances qui sont chargés à vous avec leurs date. Vous pouvez aussi affectez les notes!</p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('{{ asset('img/admin.jpeg') }}')"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>Section dédiée à l'administration</h2>
                        <p class="lead mb-0">Ajoutez les étudiants, les membres de jury, les salles, affectez jury pour chaque soutenance, fixer les dates et encore plus depuis la platforme!</p>
                    </div>
                </div>
            </div>
        </section> --}}
        
<!-- créateurs-->
        {{-- <section class="testimonials text-center bg-light">
            <div class="container">
                <h2 class="mb-5">Les Créateurs...</h2>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="{{ asset('img/testimonials-2.jpg') }}"/>
                            <h5>Zakaria ELFARD</h5>
                            <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="{{ asset('img/younes.jpg') }}"/>
                            <h5>Younes KHOUBAZ</h5>
                            <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of super nice landing pages."</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="{{ asset('img/testimonials-2.jpg') }}"/>
                            <h5>Ayoub ELGHAYTI</h5>
                            <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to us!"</p>
                        </div>
                    </div>
                </div>
            </div> --}}
        </section>



@endsection