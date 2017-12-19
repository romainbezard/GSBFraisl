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
        $message = "";
        return view('formModMDP',compact('erreur', 'message'));
    }
    public function verifMdp(Request $request){
        // Recup ancien mdp 
        $login = Session::get('login');
        $mdp = $request->input('pwd');
        
        $pwd = new GsbFrais();
        
        // Verif que mdp saisi = ancien mdp
        $bonPwd = $pwd->verifMdp($login, $mdp);
        $message = "";
        if(empty($bonPwd)){
            $erreur = "Erreur de mot de passe";
            return view('formModMDP',compact('erreur', 'message'));
        }else{
            $nouveauMdp = $request->input('npwd');
            $confirmMdp = $request->input('rnpwd');
            // Verif si les nouveaux mdp sont identiques 
            if($nouveauMdp == $confirmMdp){
                // Modifié le mdp dans la BDD
                if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])#', $nouveauMdp)) {
                    $erreur = '';
                    $message = "Mise à jour bien effectuée !";
                    $pwd->setNouveauMdp($nouveauMdp,$login);
                    return view('formModMDP', compact('erreur', 'message'));
                }
                else {
                    $message = "";
                    $erreur = 'ERREUR : Mot de passe non conforme. (Il faut une majuscule et un chiffre obligatoirement !)';
                     return view('formModMDP', compact('erreur', 'message'));
               }	
                
            }else if($nouveauMdp == $mdp){
                $erreur = "Mot de passe identique à l'ancien";
                $message = "";
                return view('formModMDP', compact('erreur', 'message'));
            }
            else{
                // return Mots de passe différents
                $erreur = "Mot de passe différents";
                $message = "";
                return view('formModMDP',compact('erreur', 'message'));
            }
            
        }
        
        
        
        //$erreur = "";
        //$message = "";
        

        //return view('formModMDP',compact('message','erreur'));
    }
    
}
