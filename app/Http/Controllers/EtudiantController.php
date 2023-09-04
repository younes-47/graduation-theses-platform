<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\Jury;
use Illuminate\Http\Request;
use App\Models\Soutenance;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EtudiantController extends Controller
{

    function accueil()
    {

        //requete bach tjbed smia
        $nom_complet = User::where('role', '0')->join('etudiants', 'users.user_id', '=', 'etudiants.num_etd')->where('etudiants.num_etd', '=', auth()->user()->user_id)
            ->select('etudiants.nom', 'etudiants.prenom')->get('*');

        //requete bach n3rfo etudiant wach deja khtar sujet ola la
        $khtar = Projet::orderby('updated_at', 'DESC')->where('num_etd', auth()->user()->user_id)->first();

        //les sujets li deja tkhtarohom fel filliere
        $all_info = Etudiant::where('num_etd', auth()->user()->user_id)->first();
        $filiere = $all_info->filiere;
        
        $sujets = Projet::where('filiere_etudiant',$filiere)->where('etat','oui')->get('*');

        //les infos ela soutenance dyal etudiant
        $soutenance = Soutenance::where('num_etd',auth()->user()->user_id)->first();
        $encadrant =null;
        if($soutenance != null){
            $encadrant = Jury::where('num_jury',$soutenance->encadrant)->first();
        }
        $email = null;
        if($encadrant != null){
            $email = User::select('email')->where('user_id',$encadrant->num_jury)->value('email');
        }

        return view('etudiant-panel.accueil', compact('nom_complet', 'khtar', 'sujets','filiere','soutenance','encadrant','email'));
    }

    function choisirPFE(Request $req)
    {
        /*  $soutenance = new Soutenance();

        //had requete bach njbdo le nom & prenom dyal etudiant o nstockiwha f table de soutenenaces
        $nom_complet = Etudiant::where('num_etd', auth()->user()->user_id)->select('etudiants.nom','etudiants.prenom')->first();
        
        //had requete bach njbdo filliere dyal etudiant mn table etudtants
        $filiere = Etudiant::where('num_etd', auth()->user()->user_id)->select('filiere')->first();

        //daba 3amar table dyal soutenances bhad les infos
       $soutenance->nom_etudiant = $nom_complet->nom;
        $soutenance->prenom_etudiant = $nom_complet->prenom;
        $soutenance->num_etd = auth()->user()->user_id;
        $soutenance->filiere = $filiere->filiere;
        $soutenance->projet = $req->projet;
        $soutenance->save();*/


        $projet = new Projet();
        $nom = Etudiant::where('num_etd', auth()->user()->user_id)->value('nom');
        $prenom = Etudiant::where('num_etd', auth()->user()->user_id)->value('prenom');
        $filiere = Etudiant::where('num_etd', auth()->user()->user_id)->value('filiere');

        $projet->nom_projet = $req->projet;
        $projet->nom_etudiant = $nom;
        $projet->prenom_etudiant = $prenom;
        $projet->num_etd = auth()->user()->user_id;
        $projet->filiere_etudiant = $filiere;

        $projet->save();
        return redirect('/etudiant-panel/accueil');
    }

    function profile()
    {

        $etudiant = Etudiant::where('num_etd', auth()->user()->user_id)->get('*');
        return view('etudiant-panel.profile', compact('etudiant'));
    }

    function changer_password_page(){

        return view('etudiant-panel.changer_password');
    }

    function changer_password(Request $request){

        if(Hash::check($request->old_pass,auth()->user()->password)){
            User::where('role','0')->where('user_id',auth()->user()->user_id)->get('*')->first()->update([
                'password' => bcrypt($request->new_pass)
            ]);
            
            return redirect('/login')->with('success','Le Mot de passe est bien modifié!');
        }
        else{

            session()->flash('message', 'Mot de passe incorrect!');

            return redirect()->back();
        }

    }
}
