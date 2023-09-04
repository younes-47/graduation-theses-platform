<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('titre')</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"
        type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css" />
 
    {{-- DatatTables Style --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/notre_style.css') }}" rel="stylesheet" />
    
    
  
</head>

<body>

    <!-- Header -->
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="{{ URL::to('/accueil') }}"><img src="{{ asset('img/estLogo.png') }}" style="width: 80%; height: 80%"></a>
            <a class="btn btn-primary" href="{{ URL::to('/login') }}">Se connecter</a>
        </div>
    </nav>



    @yield('content')




    <!-- Footer-->

    <footer class="footer" style="background-color: #eaecf4 !important">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <ul class="list-inline mb-2">

                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="https://est.uit.ac.ma/contact/"
                                target="_blank">Contact</a></li>
                        <li class="list-inline-item">⋅</li>

                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; Copyright Tous droits réservés 2020, Ecole
                        Supérieure de Technologie - Kénitra</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="https://web.facebook.com/ESTKenitra" target="_blank"><i
                                    class="bi-facebook fs-3"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.myTable').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
                }
            });
        });
    </script>


</body>

</html>
