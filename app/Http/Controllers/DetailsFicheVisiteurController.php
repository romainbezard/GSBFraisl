<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;
use App\metier\GsbFrais;

class DetailsFicheVisiteurController extends Controller {
    
    public function DetailsFicheFrais($idVisiteur,$mois)
    {
        $Gsb = new GsbFrais();
        $FicheForfait = $Gsb->getDetailFichesForfait($mois, $idVisiteur);
        $FicheHorsForfait = $Gsb->getDetailFichesHorsForfait($mois, $idVisiteur);
        $erreur='';
        return view('detailsFicheVisiteur', compact('FicheForfait','FicheHorsForfait','erreur'));
    }
    
}

