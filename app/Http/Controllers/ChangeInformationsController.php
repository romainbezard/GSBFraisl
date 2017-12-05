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
        return view('formModifInformations', compact('erreur', 'ligne'));        
    }
    
    public function modifInformations(Request $request)
    {
        $pwd = new GsbFrais();
        $id = Session::get('id');
        $ligne = $pwd->getInfosVisiteur2($id);
        
        $adresse = $request->input('adresse');
        $numTel = $request->input('numTel');
        $email = $request->input('email');
        
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
        
        $message = "Modification bien faite !";
        return view('home', compact('message'));
    }
    
}
