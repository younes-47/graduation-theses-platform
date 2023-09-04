@extends('dashboard')


@section('content')


<div class="panel-body">
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date de naissance</th>
            <th>Ville de naissance</th>
            
            
            <th>Matière</th>
           <div class="action">
            <th>Action</th>
            </div>
        
            
        </tr>
    </thead>
    <tbody>
        @foreach ($juries as $item)
        
            <tr>
                <td>{{$item['id']}}</td>
                <td>{{$item['nom']}}</td>
                
                <td>{{$item['prenom']}}</td>
                <td>{{$item['date_naissance']}}</td>
                <td>{{$item['ville_naissance']}}</td>
                
                <td>{{$item['matiere']}}</td>
                
                <td> <a href="supprimerJury/{{$item['id']}}" style=" background-color:red; " class="btn btn-warning">Supprimer</a></td>
                <td> <a href="afficherModifierJury/{{$item['id']}}" class="btn btn-warning">Modifier</a></td>
                
            </tr>
        @endforeach

    </tbody>
</table>
                      
</div>

@endsection