@extends('dashboard')
@section('titre','Membres des Jury - Liste')
@section('content')
<div class="container" style="padding:30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert" style=" background-color:lightblue; color:black;">
                                {{ session('status')}}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <a href="ajouterJury" class="btn btn-success pull-right" style="float:right;">Ajouter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-center" style="font-size: x-large">Liste des membres des jurys</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered myTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Grade</th>
                                    <!-- <th>Spécialité</th> -->
                                    <th>Université</th>
                                    <!-- <th>Etablissement</th> -->
                                    <div class="action">
                                        <th>Action</th>
                                    </div>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($jurys as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item['nom']}}</td>

                                    <td>{{$item['prenom']}}</td>
                                    <td>{{$item['grade']}}</td>
                                    <!-- <td>{{$item['specialité']}}</td> -->
                                    <td>{{$item['université']}}</td>

                                    <!-- <td>{{$item['etablissement']}}</td> -->

                                    <td> <a href="afficherJury/{{$item['id']}}" class="btn btn-warning" style=" background-color:blue; color:white">Afficher</a>
                                        <a href="supprimerJury/{{$item['id']}}" style=" background-color:red; "
                                         class="btn btn-warning" onclick="return confirm('Voulez vous supprimez ce membre de jury?')">Supprimer</a>
                                        <a href="afficherModifierJury/{{$item['id']}}" class="btn btn-warning">Modifier</a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


@endsection

@section('script')
<script>
$(document).ready(function() {
                $('.myTable').DataTable({
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
                    }
                });
            });
</script>
@endsection