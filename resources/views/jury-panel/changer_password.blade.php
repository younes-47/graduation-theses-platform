@extends('/jury-panel/template')

@section('titre', 'Changer mot de passe')

@section('content')
    <br><br><br>

    <div class="container">
        <div class="card shadow mb-4" style="margin-left: 20rem; margin-right: 20rem;">
            <div class="card-header bg-gradient-info py-3">
                <h6 class="m-0 font-weight-bold text-white text-center" style="font-size: x-large;">Changer le mot de passe
                </h6>
            </div>
            <div class="card-body">
                <form action="{{ route('changer_password_jury') }}" method="POST" class="form-horizontal">
                    @csrf
                    <label for="old" class="form-label text-gray-800">Ancien mot de passe</label>
                    <input type="password" id="old" class="form-control" name="old_pass"
                        aria-describedby="passwordHelpBlock" required>
                    <br>
                    <label for="new" class="form-label text-gray-800">Nouveau mot de passe</label>
                    <input type="password" id="new" class="form-control" name="new_pass"
                        aria-describedby="passwordHelpBlock" required>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <br>
                        <button type="submit" class="btn"
                            style="background-color: green; color: white;">Changer</button>
                    </div>
                    <br>
                </form>
                @if (session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>


@endsection
