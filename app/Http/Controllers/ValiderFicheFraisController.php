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
        $id = $request->input('idModifier');
        $gsbFrais = new GsbFrais();
        $gsbFrais->ModifierFicheFrais($montant, $id);
        Session::put('status', 'Modification effectuée');
        return redirect('/ValiderFicheFrais');
    }
    
    public function SupprimerFicheHorsForfait(Request $request){
        $libelle = $request->input('libelle');
        $date = $request->input('date');
        $id = $request->input('id');
        $motif = $request->input('motif');
        
        $gsbFrais = new GsbFrais();
        
        $gsbFrais->SupprimerHorsForfait($libelle, $id, $date, $motif);
        Session::put('status', 'Suppression frais hors forfait effectuée !');
        return redirect('/ValiderFicheFrais');
    }
    
    public function AfficherMotif($libelle, $id, $date){
        
        return view('/MotifSuppr',compact('libelle','id','date'));
    }
    
    public function AnnuleMotif(){
        return redirect('/ValiderFicheFrais');
    }
}
