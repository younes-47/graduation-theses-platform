@extends('dashboard')
@section('titre','Soutenances - Liste')
@section('content')
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert"
                                        style=" background-color:lightblue; color:black;">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center" style="font-size: x-large">Liste des soutenances</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5%">ID</th>
                            <th style="width: 15%">Etudiant</th>
                            <th style="width: 16%">N° Salle</th>
                            <th style="width: 18%">Date Soutenance</th>
                            <th style="width: 18%">Jury</th>
                            <th style="width: 20%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($soutenances as $item)
                            <tr>
                                <td>{{ $item['id'] }}</td>
                                <td>{{ $item['nom_etudiant'] }} {{ $item['prenom_etudiant'] }}</td>
                                <td>{{ $item['num_salle'] }}</td>
                                <td>{{ $item['date_soutenance'] }} à {{ $item['heure_soutenance'] }}</td>
                                <td>
                                    @php
                                        $jurys = \App\Models\Relations::where('id_soutenance', $item['id'])->get('*');
                                    @endphp
                                    @foreach ($jurys as $jury)
                                        @php
                                            $nom_complet = \App\Models\Jury::where('num_jury', $jury->num_jury)
                                                ->get('*')
                                                ->first();
                                        @endphp
                                        {{ $nom_complet->nom }} {{ $nom_complet->prenom }},<br>
                                    @endforeach
                                </td>



                                <td> <a href="afficherSoutenance/{{ $item['id'] }}" class="btn btn-warning"
                                        style=" background-color:blue; color:white">Afficher</a>
                                    {{-- <a href="supprimerSoutenance/{{ $item['id'] }}" style=" background-color:red; "
                                        class="btn btn-warning"
                                        onclick="return confirm('Voulez vous supprimer cette soutenance?')">Supprimer</a> --}}
                                    <a href="afficherModifierSoutenance/{{ $item['id'] }}"
                                        class="btn btn-warning">Modifier</a>

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
