@extends('dashboard')

@section('titre', 'Interface Administrateur')

@section('content')

@php
        $etudiants= App\Models\Etudiant::where('id','>', -1)->count();
        $juries = App\Models\Jury::where('id','>', -1)->count();
        $soutenances = App\Models\Soutenance::where('id','>', -1)->count();
@endphp

    
        <br>
        <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total des étudiants</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$etudiants}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total des profs</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $juries}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-tie fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total des soutenances</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$soutenances}} </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-graduation-cap fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>       
        </div>
       
       
    






@endsection
