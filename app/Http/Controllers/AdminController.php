<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Jury;
use App\Models\User;
use App\Models\Soutenance;
use App\Models\Projet;
use App\Models\Relations;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Source;

class AdminController extends Controller
{


    function dashboard()
    {
        return view('admin-panel.accueil');
    }

    function listeEtudiant()
    {
        $data = Etudiant::all();
        return view('admin-panel/listeEtudiant', ['etudiants' => $data]);
    }
    function ajouterEtudiant(Request $req)
    {
        
        $req->validate(
            [
            "nom" => "required",
            "prenom" => "required",
            "date_naissance" => "required",
            "adresse" => "required",
            "filiere" => "required",
            "num_telephone" => "numeric",
            "num_etd" => "required",
            ],
            [
                'required' => 'Touts les champs sont obligatoires'
            ]
        );

        
        $etudiant = new Etudiant();
        $etudiant->nom = $req->nom;
        $etudiant->prenom = $req->prenom;
        $etudiant->date_naissance = $req->date_naissance;
        $etudiant->adresse = $req->adresse;
        $etudiant->num_telephone = $req->num_telephone;
        $etudiant->filiere = $req->filiere;
        $etudiant->num_etd = $req->num_etd;
        $user = new User();
        // $user->email = $req->email;
        $user->email = str_replace(' ', '', strtolower($req->prenom)).".".str_replace(' ', '', strtolower($req->nom))."@uit.ac.ma";
        $user->password = Hash::make(str_replace(' ', '', strtolower($req->prenom)).str_replace(' ', '', strtolower($req->nom))."2022");
        $user->role = 0;
        $user->user_id = $etudiant->num_etd;
        $user->save();
        $etudiant->save();
        return redirect('/listeEtudiant');
    }
    function supprimerEtudiant($id)
    {
        Etudiant::destroy($id);
        return redirect('/listeEtudiant');
    }
    function afficherModifierEtudiant($id)
    {
        $etudiants = Etudiant::findOrFail($id);
        return view('admin-panel/afficherModifierEtudiant')->with('etudiants', $etudiants);
    }
    function modifierEtudiant($id, Request $req)
    {
        $etudiant = Etudiant::find($id);
        $etudiant->nom = $req->input('nom');
        $etudiant->prenom = $req->input('prenom');
        $etudiant->date_naissance = $req->input('date_naissance');
        $etudiant->adresse = $req->input('adresse');
        $etudiant->num_telephone = $req->input('num_telephone');
        $etudiant->filiere = $req->input('filiere');
        $etudiant->num_etd = $req->input('num_etd');
        $etudiant->update();

        //hila bgha admin ybadal mot de passe dyal etudiant (fel cas dyal etudiant nsa mot de passe)
        User::where('role','0')->where('user_id',$req->input('num_etd'))->get('*')->first()->update([
            'password' => bcrypt($req->new_pass_etd)
        ]);

        return redirect('/listeEtudiant')->with('status', 'Etudiant est bien modifié');
    }
    function afficherEtudiant($id)
    {
        $data = Etudiant::find($id);
        return view('admin-panel/afficherEtudiant', ['etudiant' => $data]);
    }
    function listeJury()
    {
        $data = Jury::all();
        return view('admin-panel/listeJury', ['jurys' => $data]);
    }
    function ajouterJury(Request $req)
    {
       
        $req->validate(
            [
            "nom" => "required",
            "prenom" => "required",
            "specialité" => "required",
            "grade" => "required",
            "université" => "required",
            "etablissement" => "required",
            ],
            [
                'required' => 'Touts les champs sont obligatoires'
            ]
        );


        $jury = new Jury();
        $jury->nom = $req->nom;
        $jury->prenom = $req->prenom;
        $jury->grade = $req->grade;
        $jury->specialité = $req->specialité;
        $jury->université = $req->université;
        $jury->etablissement = $req->etablissement;
        $jury->num_jury = $req->num_jury;

        $user = new User();
        $user->email = str_replace(' ', '', strtolower($req->prenom)).".".str_replace(' ', '', strtolower($req->nom))."@uit.ac.ma";
        $user->password = Hash::make(str_replace(' ', '', strtolower($req->prenom)).str_replace(' ', '', strtolower($req->nom))."2022");
        // $user->email = $req->email;
        // $user->password = Hash::make($req->password);
        $user->role = 1;

        $user->user_id = $jury->num_jury;
        $user->save();

        $jury->save();
        return redirect('/listeJury');
    }

    function supprimerJury($id)
    {
        Jury::destroy($id);
        return redirect('/listeJury');
    }
    function afficherModifierJury($id)
    {
        $juries = Jury::findOrFail($id);
        return view('admin-panel/afficherModifierJury')->with('juries', $juries);
    }
    function modifierJury($id, Request $req)
    {
        $jury = Jury::find($id);
        $jury->nom = $req->input('nom');
        $jury->prenom = $req->input('prenom');
        $jury->grade = $req->input('grade');
        $jury->specialité = $req->input('specialité');
        $jury->université = $req->input('université');
        $jury->etablissement = $req->input('etablissement');

        $jury->num_jury = $req->input('num_jury');
        $jury->update();

        //admin y9der ybadal mot de passe dyal professeur hila nsa mot de passe dyalo o mb9ach 9adr ydkhol compte dyalo
        User::where('role','1')->where('user_id',$req->input('num_jury'))->get('*')->first()->update([
            'password' => bcrypt($req->new_pass_jury)
        ]);

        return redirect('/listeJury')->with('status', ' Le Jury est bien modifié');
    }
    function chercherJury(Request $req)
    {
        $data = Jury::where('nom', 'like', '%' . $req->input('query') . '%')->get();
        return view('admin-panel/chercherJury', ['juries' => $data]);
    }

    function afficherJury($id)
    {
        $data = Jury::find($id);
        return view('admin-panel/afficherJury', ['jury' => $data]);
    }
    function listeSoutenance()
    {
        $data = Soutenance::all();
        return view('admin-panel/listeSoutenance', ['soutenances' => $data]);
    }

    function logout()
    {
        Auth::logout();
        return redirect('/accueil');
    }

    function listeProjet()
    {
        $data = Projet::all()->where('etat', '=', null);
        return view('admin-panel/listeProjet', ['projets' => $data]);
    }


    function afficherProgrammerSoutenance($id)
    {
        $projets = Projet::FindOrFail($id);
        $juries = Jury::all();
        return view('admin-panel/programmerSoutenance', compact('juries'))->with('projets', $projets);
    }
    function programmerSoutenance(Request $req, $id)
    {
        $req->validate(
            [
                'prenom' => 'required',
                'nom' => 'required',
                'date_soutenance' => 'required',
                'heure_soutenance' => 'required',
                'num_salle' => 'required',
                'encadrant' => 'required',
                'membre_jury' => 'required',
            ],
            [
                'required' => 'Touts les champs sont obligatoires'
            ]
        );


        //nchofo wach kayn chi soutenance 3ndha nfs date o salle
        $test = Soutenance::where('date_soutenance', $req->date_soutenance)->where('num_salle', $req->num_salle)->where('heure_soutenance',$req->heure_soutenance)
            ->get('*');
        if ($test->count() != 0) {
            return redirect()->back()->with('error', 'Il se trouve déjà une soutenance avec la même salle et la même date et horaire! Essayez de choisir une autre salle ou changer la date ou l\'horaire.');
        }


        $projet = Projet::where('id', $id)->get('*')->first()->nom_projet;
        $soutenance = new Soutenance();
        $soutenance->num_etd = Projet::where('id', $id)->get('*')->first()->num_etd;
        $soutenance->nom_etudiant = $req->nom;
        $soutenance->prenom_etudiant = $req->prenom;
        $soutenance->num_salle = $req->num_salle;
        $soutenance->date_soutenance = $req->date_soutenance;
        $soutenance->heure_soutenance = $req->heure_soutenance;
        $soutenance->encadrant = $req->encadrant;
        $soutenance->nom_projet = $projet;
        $soutenance->save();

        $encadrant = new Relations();
        $encadrant->num_jury = $req->encadrant;
        $encadrant->id_soutenance = Soutenance::where('nom_projet', $projet)->get('*')->first()->id;
        $encadrant->save();

        if (!empty($req->membre_jury)) {
            foreach ($req->membre_jury as $key => $jury) {
                $jurys = new Relations();
                $jurys->num_jury = $jury;
                $jurys->id_soutenance = Soutenance::where('nom_projet', $projet)->get('*')->first()->id;
                $jurys->save();
            }
        }

        Projet::find($id)->update(['etat' => 'oui']);
        return redirect('/listeSoutenance')->with('status', ' Soutenance est bien programmé');
    }

    function refuserProjet($id)
    {
        Projet::find($id)->update(['etat' => 'non']);
        return redirect('/listeProjet');
    }

    function supprimerSoutenance($id)
    {
        $info = Soutenance::find($id);
        $projets_choisis = Projet::where('num_etd', $info->num_etd)->get('*');
        foreach ($projets_choisis as $projet) {
            $projet->update(['etat' => 'non']);
        }
        $relations = Relations::where('id_soutenance', $id)->get('*');
        foreach ($relations as $relation) {
            Relations::destroy($relation->id);
        }
        Soutenance::destroy($id);
        return redirect('/listeSoutenance');
    }

    function afficherModifierSoutenance($id)
    {
        $soutenances = Soutenance::findOrFail($id);
        $juries = Jury::all();
        $encadrant = Jury::where('num_jury', $soutenances->encadrant)->get('*')->first();
        $membres = Relations::where('id_soutenance', $id)->get('*');
        return view('admin-panel/afficherModifierSoutenance', compact('juries', 'encadrant', 'membres'))->with('soutenances', $soutenances);
    }

    function modifierSoutenance($id, Request $req)
    {



        //nchofo wach kayn chi soutenance 3ndha nfs date o salle
        $test = Soutenance::where('date_soutenance', $req->date_soutenance)->where('num_salle', $req->num_salle)->where('heure_soutenance',$req->heure_soutenance)
            ->get('*');
        if ($test->count() != 0) {
            return redirect()->back()->with('error', 'Il se trouve déjà une soutenance avec la même salle et la même date et horaire! Essayez de choisir une autre salle ou changer la date ou l\'horaire.');
        }

        $soutenance = Soutenance::find($id);
        $soutenance->num_salle = $req->input('num_salle');
        $soutenance->date_soutenance = $req->input('date_soutenance');
        $soutenance->heure_soutenance = $req->input('heure_soutenance');

        //hila kan encadrant jdid mkynch deja m3a les membres de jury tatsuprrimi encadrant l9dim mn jury
        // o tat2ajouti jdid f table relations

        if (Relations::where('num_jury', $req->input('encadrant'))->where('id_soutenance', $id)->get('*')->count() == 0) {

            Relations::where('num_jury', $soutenance->encadrant)->where('id_soutenance', $id)->get('*')->first()->delete();

            $relation = new Relations();
            $relation->num_jury = $req->input('encadrant');
            $relation->id_soutenance = $id;
            $relation->save();

            $soutenance->encadrant = $req->input('encadrant');
        } else { //hila kan deja sf gha tatchangi
            $soutenance->encadrant = $req->input('encadrant');
        }

        $soutenance->update();



        //supprimer les membres de jury li tdar lihm enlever
        if (!empty($req->old_membre_jury)) {
            foreach ($req->old_membre_jury as $key => $old_membre_jury) {
                $old = Relations::where('num_jury', $old_membre_jury)->where('id_soutenance', $id)->get()->first();
                $old->delete();
            }
        }

        //ajouter les membres de jury li tzado
        if (!empty($req->new_membre_jury)) {
            foreach ($req->new_membre_jury as $key => $new_membre_jury) {
                $test = Relations::where('num_jury', $new_membre_jury)->where('id_soutenance', $id)->get();
                //test wach membre de jury deja kayn
                if ($test->count() == 0) {
                    $relation = new Relations();
                    $relation->num_jury = $new_membre_jury;
                    $relation->id_soutenance = $id;
                    $relation->save();
                } else {
                    continue;
                }
            }
        }

        return redirect('/listeSoutenance')->with('status', ' La soutenance est bien modifié');
    }

    function afficherSoutenance($id)
    {
        $data = Soutenance::find($id);
        return view('admin-panel/afficherSoutenance', ['soutenance' => $data]);
    }

    function changer_password_page()
    {

        return view('admin-panel.changer_password');
    }

    function changer_password(Request $request)
    {

        $_user = auth()->user();
        if (Hash::check($request->old_pass, $_user->password)) {
            $__user = User::where('role', 2)->get('*')->first();
            $__user->update([
                'password' => bcrypt($request->new_pass)
            ]);


            return redirect('/login')->with('success', 'Le Mot de passe est bien modifié!');
        } else {

            session()->flash('message', 'Mot de passe incorrect!');

            return redirect()->back();
        }
    }
}
