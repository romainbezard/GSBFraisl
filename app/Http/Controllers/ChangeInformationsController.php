<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\metier\GsbFrais;

class ChangeInformationsController extends Controller
{
    public function afficheformModifInformations(){
        
        $pwd = new GsbFrais();
        $id = Session::get('id');
        $ligne = $pwd->getInfosVisiteur2($id);    
        /*Session::put('adresse', $ligne['adresse']);
        Session::put('numTel', $ligne['NumeroDeTelephone']);
        Session::put('email', $ligne['email']);*/
        //$adresse = $ligne['adresse'];
        $erreur = "";
        $message = "";
        return view('formModifInformations', compact('erreur', 'ligne', 'message'));        
    }
    
    public function modifInformations(Request $request)
    {
        $pwd = new GsbFrais();
        $id = Session::get('id');
        $ligne = $pwd->getInfosVisiteur2($id);
        
        $adresse = $request->input('adresse');
        $numTel = $request->input('numTel');
        $email = $request->input('email');
        $cp = $request->input('codePostal');
        $ville = $request->input('ville');
        
        if($ligne[0]->adresse != $adresse && $adresse != null)
        {
            $pwd->modifAdresse($id, $adresse);  
        }
        else if($ligne[0]->NumeroDeTelephone !=  $numTel && $numTel != null)
        {
            $pwd->modifNumTel($id, $numTel);  
        }
        else if($ligne[0]->email != $email && $email != null)
        {
            $pwd->modifEmail($id, $email);  
        } 
        else if($ligne[0]->codePostal != $cp && $cp != null)
        {
            $pwd->modifCodePostal($id, $cp);  
        } 
        else if($ligne[0]->ville != $ville && $ville != null)
        {
            $pwd->modifVille($id, $ville);  
        } 
        
        $message = "Modification(s) bien effectuée(s) !";
        $erreur = "";
        return view('formModifInformations', compact('erreur', 'ligne', 'message'));
    }
    
}
