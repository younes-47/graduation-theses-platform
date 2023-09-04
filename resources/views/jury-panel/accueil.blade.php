@extends('/jury-panel/template')

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

    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Etudiant</th>
                <th>Projet</th>
                <th>Filière</th>
                <th>date de soutenance</th>
                <th>Salle</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jury as $temp)
                @php
                    $item = \App\Models\Soutenance::where('id', $temp->id_soutenance)
                        ->get('*')
                        ->first();
                @endphp
                <tr>
                    <td>
                        <div class="d-flex align-items-center">

                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{ $item['nom_etudiant'] }} {{ $item['prenom_etudiant'] }}</p>

                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">{{ $item['nom_projet'] }}</p>

                    </td>
                    <td>
                        <?php $filiere_etd = App\Models\Etudiant::where('nom', $item['nom_etudiant'])->first();
                        ?>
                        {{ $filiere_etd->filiere }}
                    </td>
                    <td>{{ $item['date_soutenance'] }} à {{ $item['heure_soutenance'] }}</td>
                    <td>
                        {{ $item['num_salle'] }}
                    </td>
                    <td>
                        <?php if($item['note_finale'] == NULL){?>
                        <form method="POST" action="/jury-panel/accueil/noterSoutenance/{{ $item->id }}"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                @csrf
                                <label for="recipient-name" class="col-form-label">Note:</label>
                                <input type="number" required step=".01" class="form-control" id="recipient-name"
                                    name="note">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                        <?php }?>

                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="background-color:red">Noter soutenance</button> -->


                        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Noter la soutenance</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="/jury-panel/accueil/noterSoutenance/{{ $item->id }}"  enctype="multipart/form-data">
              <div class="form-group">
              @csrf
                <label for="recipient-name" class="col-form-label">Note:</label>
                <input type="number" class="form-control" id="recipient-name" name="note">
              </div>
              <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </div>
            </form>
          </div>
         
        </div>
      </div>
    </div> -->
                        {{ $item['note_finale'] }}
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
