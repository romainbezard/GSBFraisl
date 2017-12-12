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
    }
    
}
