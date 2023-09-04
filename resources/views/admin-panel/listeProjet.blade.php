@extends('dashboard')
@section('titre','Projets Choisis - Liste')
@section('content')

<br><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center" style="font-size: x-large">Liste des projets</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom d'etudiant</th>
                            <th>Prenom d'etudiant</th>
                            <th>Projet</th>
                            <div class="action">
                                <th>Action</th>
                            </div>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($projets as $item)
                            <tr>
                                <td>{{ $item['id'] }}</td>
                                <td>{{ $item['nom_etudiant'] }}</td>
                                <td>{{ $item['prenom_etudiant'] }}</td>


                                <td>{{ $item['nom_projet'] }}</td>



                                <td> <a href="afficherProgrammerSoutenance/{{ $item['id'] }}" class="btn btn-warning"
                                        style=" background-color:blue; color:white">Programmer</a>
                                    <a href="refuserProjet/{{ $item['id'] }}" style=" background-color:red; "
                                        class="btn btn-warning"
                                        onclick="return confirm('Voulez vous refuser ce membre de projet?')">Refuser</a>

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
