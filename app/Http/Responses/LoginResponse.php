<?php
namespace App\Http\Responses;
use Laravel\Fortify\Contracts\LoginResponse as ContractsLoginResponse;
class LoginResponse implements ContractsLoginResponse
{
    public function toResponse($request)
    {
        
        if (auth()->user()->role == '2') {
            return redirect('/dashboard');
        }
        elseif(auth()->user()->role == '1'){
            return redirect('/jury-panel/accueil');
        }
        else{
            return redirect('/etudiant-panel/accueil');
        }

    }
}