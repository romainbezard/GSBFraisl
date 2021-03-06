<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Afficher le formulaire d'authentification 
Route::get('/getLogin', 'ConnexionController@getLogin');  

// Authentifie le visiteur à partir du login et mdp saisis
Route::post('/login', 'ConnexionController@logIn');

// Déloguer le visiteur
Route::get('/Logout', 'ConnexionController@logOut');

//saisirFrais
Route::get('/saisirFraisForfait', 'FraisForfaitController@saisirFraisForfait');

//saisirFrais
Route::post('/saisirFraisForfait', 'FraisForfaitController@validerFraisForfait');

// Afficher la liste des fiches de Frais du visiteur connecté
Route::get('/getListeFrais', 'VoirFraisController@getFraisVisiteur');

// Afficher le détail de la fiche de frais pour le mois sélectionné
Route::get('/voirDetailFrais/{mois}', 'VoirFraisController@voirDetailFrais');

// Afficher la liste des frais hors forfait d'une fiche de Frais
Route::get('/getListeFraisHorsForfait/{mois}', 'FraisHorsForfaitController@getFraisHorsForfait');

// Afficher le formulaire d'un Frais Hors Forfait pour une modification
Route::get('/modifierFraisHorsForfait/{idFrais}', 'FraisHorsForfaitController@modifierFraisHorsForfait');

// Afficher le formulaire d'un Frais Hors Forfait pour un ajout
Route::get('/ajouterFraisHorsForfait/{mois}', 'FraisHorsForfaitController@saisirFraisHorsForfait');

// Enregistrer une modification ou un ajout d'un Frais Hors Forfait
Route::post('/validerFraisHorsForfait', 'FraisHorsForfaitController@validerFraisHorsForfait');

// Supprimer un Frais Hors Forfait
Route::get('/supprimerFraisHorsForfait/{idFrais}', 'FraisHorsForfaitController@supprimmerFraisHorsForfait');

// Retourner à une vue dont on passe le nom en paramètre
Route::get('getRetour/{retour}', function($retour){
    return redirect("/".$retour);
});

// Afficher le formulaire de modif MDP
Route::get('/ChangePassword', 'ChangePasswordController@afficheformModifMdp');

// Modifier MDP
Route::post('/ChangePassword','ChangePasswordController@verifMdp');


/* MODIFICATION  */

// Afficher les visiteurs avec les frais à l'état clôturé
Route::get('/ValiderFicheFrais','ValiderFicheFraisController@afficheUtilisateur');

// Affiche les fiches de l'utilisateurs
Route::get('/AfficheFicheUser/{id}/{mois}','ValiderFicheFraisController@afficheFrais');

// Valide fiche frais
Route::get('/ValideFiche/{id}/{mois}/{total}/{totalHf}','ValiderFicheFraisController@valideFiche');

// Modifier montant fiche frais

Route::post('/ModifierMontantFiche/{id}/{mois}','ValiderFicheFraisController@modifierFiche');

// Supprimer fiche frais hord forfait
Route::post('/MettreMotif/{id}/{mois}','ValiderFicheFraisController@AfficherMotif');
Route::post('/SupprimerFicheFrais/{id}/{mois}', 'ValiderFicheFraisController@SupprimerFicheHorsForfait');
Route::get('/AnnulerMotif/{id}/{mois}', 'ValiderFicheFraisController@AnnuleMotif');

/******************************/
//Afficher le formulaire de modif Informations
Route::get('/ChangeInformations', 'ChangeInformationsController@afficheformModifInformations');

//Modifier Informations
Route::post('/ChangeInformations', 'ChangeInformationsController@modifInformations');

// Accès Page SuivreFicheFrais
Route::get('/SuivreFicheFrais','SuivreFicheFraisController@afficherformSuivreficheFrais');
Route::post('/SuivreFicheFrais','SuivreFicheFraisController@getFichesVisiteur');

// Accès Détails des FicheFrais
Route::get('/DetailsFicheFrais','/DetailsFicheFraisController@affichageListeFiche');
//Afficher le formulaire de "Création d'un visteur" pour le comptable
Route ::get('/creerNouveauVisiteur', 'CreerVisiteurController@afficheformCreerVisiteur');

//Créer un nouveau visiteur (Comptable)
Route::post('/creerNouveauVisiteur', 'CreerVisiteurController@creerUnNouveauVisiteur');


//Suivre fiche frais (Charles)
//Route::get('/SuivreFicheFrais','SuivreFicheFraisController@afficherformSuivreficheFrais');
Route::get('/SuivreFicheFrais','SuivreFicheFraisController@getFichesVisiteur');
Route::post('/SuivreFicheFrais','SuivreFicheFraisController@getFichesVisiteur');


//Details Fiche Visiteur Comptable
Route::get('/DetailsFicheVisiteur/{mois}/{idVisiteur}','DetailsFicheVisiteurController@DetailsFicheFrais');
Route::post('/DetailsFicheVisiteur/{mois}/{idVisiteur}','DetailsFicheVisiteurController@DetailsFicheFrais');
/******************************/
