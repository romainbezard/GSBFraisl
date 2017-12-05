<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\metier\GsbFrais;
class ValiderFicheFraisController extends Controller
{
    /**
     * Affiche les utilisateurs avec fiche à l'état cloturé
     */
    
    public function afficheUtilisateur(){
        $gsbFrais = new GsbFrais();
        
        $resultat = $gsbFrais->getVisiteurEtatCloture('CL');
        
        
        return view('afficheUserEtatCloture',compact('resultat'));
    }
    
    public function afficheFrais(Request $request){
        $nom = $request->input('UserName');
        echo $nom;
    }
}
