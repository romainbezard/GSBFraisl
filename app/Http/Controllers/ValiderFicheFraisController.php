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
    
    public function afficheFrais($id, $mois, $nbJust, $dateModif, $montantValide){
        $gsbFrais = new GsbFrais();
        $resultat = $gsbFrais->getFicheVisiteur($id, $mois);
        $ficheHf = $gsbFrais->getFicheHfVisiteur($id, $mois);
        $total = 0;
        
        return view('afficheFicheUser',compact('resultat','mois','id','nbJust','dateModif','montantValide', 'ficheHf','total'));
    }
    
    public function valideFiche($id, $mois){
        $gsbFrais = new GsbFrais();
        $gsbFrais->valideFicheFrais($id, $mois);
        Session::put('status', 'Validation effectuée');
        return redirect('/ValiderFicheFrais');
    }
    
    public function modifierFiche(Request $request){
        $montant = $request->input('montant');
        echo $montant;
    }
}
