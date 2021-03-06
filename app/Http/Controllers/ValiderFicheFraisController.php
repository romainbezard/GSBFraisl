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
    
    public function afficheFrais($id, $mois){
        $gsbFrais = new GsbFrais();
        $resultat = $gsbFrais->getFicheForfait($id, $mois);
        $ficheHf = $gsbFrais->getFicheHfVisiteur($id, $mois);
        $donnee = $gsbFrais->getDonnee($id, $mois);
        $total = 0;
        $totalHf = 0;
        
        return view('afficheFicheUser',compact('resultat','mois','id','donnee', 'ficheHf','total','totalHf'));
    }
    
    public function valideFiche($id, $mois, $total, $totalHf){
        $montant = $total + $totalHf;
        $gsbFrais = new GsbFrais();
        $gsbFrais->valideFicheFrais($id, $mois, $montant);
        Session::put('status', 'Validation effectuée');
        return redirect('/ValiderFicheFrais');
         //return redirect()->back()->with('status','Mise à jour effectuée');
    }
    
    public function modifierFiche(Request $request, $id, $mois){
        $quantite = $request->input('quantite');
        $idFrais = $request->input('idModifier');
        $gsbFrais = new GsbFrais();
        $gsbFrais->ModifierFicheFrais($quantite, $idFrais, $mois, $id);
        //return redirect('/ValiderFicheFrais');
        return redirect()->back()->with('status','Mise à jour effectuée');
    }
    
    public function SupprimerFicheHorsForfait(Request $request, $idVisiteur, $mois){
        $libelle = $request->input('libelle');
        $date = $request->input('date');
        $id = $request->input('id');
        $motif = $request->input('motif');
        
        $gsbFrais = new GsbFrais();
        
        $gsbFrais->SupprimerHorsForfait($libelle, $id, $date, $motif);
        Session::put('status', 'Suppression effectuée');
        return $this->afficheFrais($idVisiteur, $mois);
        
    }
    
    public function AfficherMotif(Request $request, $id, $mois){
        
        $libelle = $request->input('libelle');
        $date = $request->input('date');
        $idFiche = $request->input('idFiche');
        return view('/MotifSuppr',compact('libelle','id','date', 'mois', 'idFiche'));
    }
    
    public function AnnuleMotif($id, $mois){
        return $this->afficheFrais($id, $mois);
        // Annule la suppression
    }
}
