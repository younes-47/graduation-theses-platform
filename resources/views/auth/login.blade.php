@extends('templates/main')

@section('titre', 'Connection')

@section('content')

    <br>
    <div class="container">
        <div class="alert alert-info">
            <p><i class="bi bi-info-circle-fill"></i> Veuillez consulter l'administration pour recupérer votre email et mot
                de passe assignés à vous.</p>

        </div>
    </div>

    {{-- @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <p class="alert alert-danger"><strong>{{ $message }}</strong></p>
        </div>
    @endif --}}

    @if ($message = Session::get('success'))
        <div class="alert alert-danger alert-block">
            <p class="alert alert-success"><strong>{{ $message }}</strong></p>
        </div>
    @endif



    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('img/EST.jpg') }}" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">


                                    <form action="/login" method="POST">
                                        @csrf


                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Connectez-vous!</h5>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="email" class="form-control form-control-lg"
                                                name="email" required/>
                                            <label class="form-label" for="email">Votre Email</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="mot-de-passe" class="form-control form-control-lg"
                                                name="password" required/>
                                            <label class="form-label" for="mot-de-passe">Votre Mot de passe</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block"
                                                type="submit">S'authentifier</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
