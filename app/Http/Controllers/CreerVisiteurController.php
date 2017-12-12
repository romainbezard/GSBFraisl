<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\metier\GsbFrais;

class CreerVisiteurController extends Controller
{
    public function afficheformCreerVisiteur(){
        
        $pwd = new GsbFrais();
        $id = Session::get('id');
        //$ligne = $pwd->getInfosVisiteur2($id);    
        /*Session::put('adresse', $ligne['adresse']);
        Session::put('numTel', $ligne['NumeroDeTelephone']);
        Session::put('email', $ligne['email']);*/
        //$adresse = $ligne['adresse'];
        $erreur = "";
        $message = "";
        return view('formCreerNouveauVisiteur', compact('erreur', 'message'));        
    }
    
    public function creerUnNouveauVisiteur(Request $request){
        
        $pwd = new GsbFrais();
        
        $id = $request->input('id');
        $prenom = $request->input('prenom');
        $nom = $request->input('nom');
        $login = substr($prenom, 0, 1) . $nom;
        $md = md5(uniqid(rand(), true));
        $mdp = substr($md,0,5);
        $mdpmd5 = md5($mdp);
        $adresse = $request->input('adresse');
        $codePostal = $request->input('codePostal');        
        $ville = $request->input('ville');
        $dateEmbauche = $request->input('dateEmbauche');
        $numTel = $request->input('numTel');
        $email = $request->input('email');
        
        $erreur = "";
        /*$lesIds = $pwd->getLesId();
        foreach($lesIds as $v)
        {
            if($v->id == $id) {
               $message = "Le visiteur existe déjà!";
               $erreur = "ERREUR";
            } else 
            {*/
                $pwd->ajouterVisiteur($id, $nom, $prenom, $login, $mdpmd5, $adresse, $codePostal, $ville, $dateEmbauche, $numTel, $email);
                $message="Votre visiteur a bien été ajouté avec le login et le mot de passe suivant ; LOGIN : " . $login . " | MOT DE PASSE : " . $mdp;
            /*}
        } */
        return view('formCreerNouveauVisiteur', compact('message', 'erreur'));
    }
    
}
