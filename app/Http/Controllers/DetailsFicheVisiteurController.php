<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;
use App\metier\GsbFrais;

class DetailsFicheVisiteurController extends Controller {
    
    public function DetailsFicheFrais($mois,$idVisiteur)
    {
 
        $Gsb = new GsbFrais();
        $FicheForfait = $Gsb->getDetailFichesForfait($mois, $idVisiteur);
        $FicheHorsForfait = $Gsb->getDetailFichesHorsForfait($mois, $idVisiteur);
        $visiteur = $Gsb->getVisiteur($idVisiteur);
        $FicheActuel = $Gsb->getFicheActuel($idVisiteur,$mois);
        $erreur='';
        return view('detailsFicheVisiteur', compact('FicheForfait','FicheHorsForfait','FicheActuel','visiteur','erreur'));
    }
    
}

