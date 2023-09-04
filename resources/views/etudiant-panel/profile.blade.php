@extends('/etudiant-panel/template')

@section('titre','Profile')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2 class="mt-4 text-gray-900" style="text-align: center;">Détails Personnelles</h2>
        </div>
    </div>
</div>
<br>



@foreach($etudiant as $etd )
<div class="container" style="width: 600px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 30px">

    <dl class="dl-horizontal">
        <dt class="text-gray-800">Nom:</dt>
        <dd class="list-group-item" style="border-radius: 1rem;">{{ $etd->nom }}</dd>

        <dt class="text-gray-800">Prenom:</dt>
        <dd class="list-group-item" style="border-radius: 1rem;">{{ $etd->prenom }}</dd>

        <dt class="text-gray-800">Numéro etudiant:</dt>
        <dd class="list-group-item" style="border-radius: 1rem;">{{ $etd->num_etd }}</dd>

        <dt class="text-gray-800">Filière:</dt>
        <dd class="list-group-item" style="border-radius: 1rem;">{{ $etd->filiere }}</dd>

        <dt class="text-gray-800">Date naissance:</dt>
        <dd class="list-group-item" style="border-radius: 1rem;">{{ $etd->date_naissance }}</dd>

        <dt class="text-gray-800">L'adresse:</dt>
        <dd class="list-group-item" style="border-radius: 1rem;">{{ $etd->adresse }}</dd>

        <dt class="text-gray-800">N°Téléphone:</dt>
        <dd class="list-group-item" style="border-radius: 1rem;">{{ $etd->num_telephone}}</dd>



    </dl>

</div>
@endforeach
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <br>
    <a class="btn btn-primary" href="{{URL::to('/etudiant-panel/accueil')}}">Retourner</a>
</div>
<br><br>



@endsection