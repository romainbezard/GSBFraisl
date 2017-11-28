<?php
// ZBLE
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
    public function verifMdp(Request $request){
        // Recup ancien mdp 
        $login = Session::get('login');
        $mdp = $request->input('pwd');
        
        $pwd = new GsbFrais();
        
        // Verif que mdp saisi = ancien mdp
        $bonPwd = $pwd->getInfosVisiteur($login, $mdp);
        if(empty($bonPwd)){
            // return Erreur mot de passe
            $erreur = "Erreur de mot de passe";
            return view('formModMDP',compact('erreur'));
        }else{

            $nouveauMdp = $request->input('npwd');
            $confirmMdp = $request->input('rnpwd');
            // Verif si les nouveaux mdp sont identiques 
            if($nouveauMdp == $confirmMdp){
                // Modifié le mdp dans la BDD
                $pwd->setNouveauMdp($nouveauMdp,$login);
                return redirect()->back()->with('status','Mise à jour effectuée');
            }else if($nouveauMdp == $mdp){
                $erreur = "Mot de passe identique à l'ancien";
                return view('formModMDP', compact('erruer'));
            }
            else{
                // return Mots de passe différents
                $erreur = "Mot de passe différents";
                return view('formModMDP',compact('erreur'));
            }
            
        }
        
        
        
        //$erreur = "";
        //$message = "";
        

        //return view('formModMDP',compact('message','erreur'));
    }
    
}
