<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;
use App\metier\GsbFrais;

class SuivreFicheFraisController extends Controller
{
    public function afficherformSuivreficheFrais()
    {
        $Frais = new GsbFrais();
        $Liste = $Frais->getListeVisiteur();
        $idVisiteur = '';
        $erreur = "";
        return view('suivreFraisComptable',  compact('Liste','idVisiteur','erreur'));
    }
    
    public function getFichesVisiteur()
    {

        $visiteur = $request->all();
        print_r($visiteur);
        $Frais = new GsbFrais();
        $ListeFiches= $Frais->getFichesVisiteur($visiteur);
        $Liste = $Frais->getListeVisiteur();
        $idVisiteur = $visiteur;
        $erreur = "";
        return view('suivreFraisComptable',  compact('Liste','idVisiteur','ListeFiches','erreur'));
    }

}