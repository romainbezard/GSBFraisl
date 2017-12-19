<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;
use App\metier\GsbFrais;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DetailsFicheController extends Controller
{
    public function affichageListeFiche()
    {
        $Frais = new GsbFrais();
        $Liste = $Frais->getDetailFiches($idVisiteur, $mois);
        
        return view('detailsFicheFrais',compact('Liste'));
        
          
      $gsbFrais = new GsbFrais();
      $idVisiteur = Session::get('id');
      $lesFraisForfait = $gsbFrais->getLesFraisForfait($idVisiteur, $mois);
      $lesFraisHorsForfait = $gsbFrais->getLesFraisHorsForfait($idVisiteur, $mois);
      $montantTotal = 0;
      foreach ($lesFraisHorsForfait as $fhf){
            $montantTotal = $montantTotal + $fhf->montant;
      }
      $titreVue = "Détail de la fiche de frais du mois ".$mois;
      $erreur = "";
      return view('listeDetailFiche', compact('lesFraisForfait', 'lesFraisHorsForfait', 'mois', 'erreur', 'titreVue','montantTotal'));
  }
    
    
}
