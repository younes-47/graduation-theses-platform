@extends('/jury-panel/template')

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



@foreach($jury as $juries )
<div class="container" style="width: 600px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 30px">

    <dl class="dl-horizontal">
        <dt class="text-gray-800">Nom:</dt>
        <dd class="list-group-item" style="border-radius: 1rem;">{{ $juries->nom }}</dd>

        <dt class="text-gray-800">Prenom:</dt>
        <dd class="list-group-item" style="border-radius: 1rem;">{{ $juries->prenom }}</dd>

        <dt class="text-gray-800">Numéro de Jury:</dt>
        <dd class="list-group-item" style="border-radius: 1rem;">{{ $juries->num_jury }}</dd>

        <dt class="text-gray-800">Grade:</dt>
        <dd class="list-group-item" style="border-radius: 1rem;">{{ $juries->grade }}</dd>

        <dt class="text-gray-800">Specialié:</dt>
        <dd class="list-group-item" style="border-radius: 1rem;">{{ $juries->specialité }}</dd>

        <dt class="text-gray-800">Université:</dt>
        <dd class="list-group-item" style="border-radius: 1rem;">{{ $juries->université }}</dd>

        <dt class="text-gray-800">Etablissement:</dt>
        <dd class="list-group-item" style="border-radius: 1rem;">{{ $juries->etablissement}}</dd>

    </dl>

</div>
@endforeach
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <br>
    <a class="btn btn-primary" href="{{URL::to('/jury-panel/accueil')}}">Retourner</a>
</div>
<br><br>



@endsection