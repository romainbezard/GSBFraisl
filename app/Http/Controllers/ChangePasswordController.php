<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\metier\GsbFrais;

class ChangePasswordController extends Controller
{
    //
    
    public function afficheformModifMdp(){
        
        $erreur = "";
        return view('formModMDP',compact('erreur'));
    }
    public function verifMdp(){
        // Recup ancien mdp 
        // Verif que mdp saisi = ancien mdp
        // Verif si les nouveaux mdp sont identiques
        // Modifié le mdp dans la BDD
        
        $erreur = "";
        $message = "";
        
        return redirect()->back()->with('status','Mise à jour effectuée');
        //return view('formModMDP',compact('message','erreur'));
    }
    
}
