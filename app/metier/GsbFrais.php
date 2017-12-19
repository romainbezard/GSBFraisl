<?php
namespace App\metier;

use Illuminate\Support\Facades\DB;

/** 
 * Classe d'accès aux données. 
 */
class GsbFrais{   
    
/**
 * Retourne tout les id existants
 
 *
*/
public function existVisiteur($id){
        $req = "SELECT * FROM visiteur WHERE id = :id";
        $ligne = DB::select($req, ['id'=>$id]);
        return $ligne;
}       
    
/**
 * Ajout d'un visiteur
 
 * @param $id, $nom, $prenom, $adresse, $codePostal, $ville, $dateEmbauche, $numTel, $email
*/
public function ajouterVisiteur($id, $nom, $prenom, $login, $mdp, $adresse, $codePostal, $ville, $dateEmbauche, $numTel, $email){
        $req = "INSERT INTO visiteur(id, nom, prenom, login, mdp, adresse, cp, ville, 
            dateEmbauche, Statut, numTel, email) VALUES (:id,:nom, :prenom, :login, :mdp, :adresse, :codePostal, :ville, :dateEmbauche, null,
            :numTel, :email)";
        DB::select($req, ['id'=>$id, 'nom'=>$nom, 'prenom'=>$prenom, 'login'=>$login, 'mdp'=>$mdp, 'adresse'=>$adresse, 'codePostal'=>$codePostal, 'ville'=>$ville, 
            'dateEmbauche'=>$dateEmbauche,'numTel'=>$numTel, 'email'=>$email,]);
}        
    
/**
 * Modification de la ville du visiteur
 
 * @param $id, $ville
*/
public function modifVille($id, $ville){
        $req = "UPDATE visiteur 
            SET visiteur.ville = :ville
            WHERE visiteur.id = :id";
        $ligne = DB::select($req, ['id'=>$id, 'ville'=>$ville]);
        return $ligne;
}    

/**
 * Modification de l'adresse du visiteur
 
 * @param $id, $codePostal
*/
public function modifCodePostal($id, $cp){
        $req = "UPDATE visiteur 
            SET visiteur.cp = :cp
            WHERE visiteur.id = :id";
        $ligne = DB::select($req, ['id'=>$id, 'cp'=>$cp]);
        return $ligne;
}    

/**
 * Modification de l'adresse du visiteur
 
 * @param $id, $adresse
*/
public function modifAdresse($id, $adresse){
        $req = "UPDATE visiteur 
            SET visiteur.adresse = :adresse
            WHERE visiteur.id = :id";
        $ligne = DB::select($req, ['id'=>$id, 'adresse'=>$adresse]);
        return $ligne;
}    
/**
 * Modification du numéro du visiteur
 
 * @param $id, $numTel
*/
public function modifNumTel($id, $numTel){
        $req = "UPDATE visiteur 
            SET visiteur.numTel = :numTel
            WHERE visiteur.id = :id";
        $ligne = DB::select($req, ['id'=>$id, 'numTel'=>$numTel]);
        return $ligne;
}    
/**
 * Modification de l'email du visiteur
 
 * @param $id, $email
*/
public function modifEmail($id, $email){
        $req = "UPDATE visiteur 
            SET visiteur.email = :email
            WHERE visiteur.id = :id";
        $ligne = DB::select($req, ['id'=>$id, 'email'=>$email]);
        return $ligne;
}    
    /**
 * Retourne les informations d'un visiteur
 
 * @param $id
 * @return l'adresse, le numéro de téléphone et l'email
*/
public function getInfosVisiteur2($id){
        $req = "select visiteur.adresse as adresse, visiteur.numTel as NumeroDeTelephone, visiteur.email as email, 
            visiteur.cp as codePostal, visiteur.ville as ville from visiteur 
        where visiteur.id=:id";
        $ligne = DB::select($req, ['id'=>$id]);
        return $ligne;
}    
/**
 * Retourne les informations d'un visiteur
 
 * @param $login 
 * @param $mdp
 * @return l'id, le nom et le prénom sous la forme d'un objet 
*/
public function getInfosVisiteur($login, $mdp){
        $req = "select visiteur.id as id, visiteur.nom as nom, visiteur.prenom as prenom, visiteur.Statut as Statut from visiteur 
        where visiteur.login=:login and visiteur.mdp=:mdp";
        $ligne = DB::select($req, ['login'=>$login, 'mdp'=>$mdp]);
        return $ligne;
}
/**
 * Retourne sous forme d'un tableau d'objets toutes les lignes de frais hors forfait
 * concernées par les deux arguments
 
 * La boucle foreach ne peut être utilisée ici car on procède
 * à une modification de la structure itérée - transformation du champ date-
 
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
 * @return un objet avec tous les champs des lignes de frais hors forfait 
*/
	public function getLesFraisHorsForfait($idVisiteur,$mois){
	    $req = "select * from lignefraishorsforfait where lignefraishorsforfait.idvisiteur =:idVisiteur 
		and lignefraishorsforfait.mois = :mois ";	
            $lesLignes = DB::select($req, ['idVisiteur'=>$idVisiteur, 'mois'=>$mois]);
//            for ($i=0; $i<$nbLignes; $i++){
//                    $date = $lesLignes[$i]['date'];
//                    $lesLignes[$i]['date'] =  dateAnglaisVersFrancais($date);
//            }
            return $lesLignes; 
	}
        
        public function getLesFraisHorsForfaitSuppr($idVisiteur,$mois){
	    $req = "select * from lignefraishorsforfait where lignefraishorsforfait.idvisiteur =:idVisiteur 
		and lignefraishorsforfait.mois = :mois and Suppr != null";	
            $lesLignes = DB::select($req, ['idVisiteur'=>$idVisiteur, 'mois'=>$mois]);
//            for ($i=0; $i<$nbLignes; $i++){
//                    $date = $lesLignes[$i]['date'];
//                    $lesLignes[$i]['date'] =  dateAnglaisVersFrancais($date);
//            }
            return $lesLignes; 
	}
/**
 * Retourne sous forme d'un tableau associatif toutes les lignes de frais au forfait
 * concernées par les deux arguments
 
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
 * @return un objet contenant les frais forfait du mois
*/
	public function getLesFraisForfait($idVisiteur, $mois){
		$req = "select fraisforfait.id as idfrais, fraisforfait.libelle as libelle, ligneFraisForfait.mois as mois,
		lignefraisforfait.quantite as quantite from lignefraisforfait inner join fraisforfait 
		on fraisforfait.id = lignefraisforfait.idfraisforfait
		where lignefraisforfait.idvisiteur = :idVisiteur and lignefraisforfait.mois=:mois
		order by lignefraisforfait.idfraisforfait";	
//                echo $req;
                $lesLignes = DB::select($req, ['idVisiteur'=>$idVisiteur, 'mois'=>$mois]);
		return $lesLignes; 
	}
/**
 * Retourne tous les id de la table FraisForfait
 * @return un objet avec les données de la table frais forfait
*/
	public function getLesIdFrais(){
		$req = "select fraisforfait.id as idfrais from fraisforfait order by fraisforfait.id";
		$lesLignes = DB::select($req);
		return $lesLignes;
	}
/**
 * Met à jour la table ligneFraisForfait
 
 * Met à jour la table ligneFraisForfait pour un visiteur et
 * un mois donné en enregistrant les nouveaux montants
 
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
 * @param $lesFrais tableau associatif de clé idFrais et de valeur la quantité pour ce frais
*/
	public function majFraisForfait($idVisiteur, $mois, $lesFrais){
		$lesCles = array_keys($lesFrais);
    //            print_r($lesFrais);
		foreach($lesCles as $unIdFrais){
			$qte = $lesFrais[$unIdFrais];
			$req = "update lignefraisforfait set lignefraisforfait.quantite = :qte
			where lignefraisforfait.idvisiteur = :idVisiteur and lignefraisforfait.mois = :mois
			and lignefraisforfait.idfraisforfait = :unIdFrais";
                        DB::update($req, ['qte'=>$qte, 'idVisiteur'=>$idVisiteur, 'mois'=>$mois, 'unIdFrais'=>$unIdFrais]);
		}
		
	}
/**
 * met à jour le nombre de justificatifs de la table ficheFrais
 * pour le mois et le visiteur concerné
 
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
*/
	public function majNbJustificatifs($idVisiteur, $mois, $nbJustificatifs){
		$req = "update fichefrais set nbjustificatifs = :nbJustificatifs 
		where fichefrais.idvisiteur = :idVisiteur and fichefrais.mois = :mois";
		DB::update($req, ['nbJustificatifs'=>$nbJustificatifs, 'idVisiteur'=>$idVisiteur, 'mois'=>$mois]);	
	}
/**
 * Teste si un visiteur possède une fiche de frais pour le mois passé en argument
 
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
 * @return vrai ou faux 
*/	
	public function estPremierFraisMois($idVisiteur,$mois)
	{
		$ok = false;
		$req = "select count(*) as nblignesfrais from fichefrais 
		where fichefrais.mois = :mois and fichefrais.idvisiteur = :idVisiteur";
		$laLigne = DB::select($req, ['idVisiteur'=>$idVisiteur, 'mois'=>$mois]);
                $nb = $laLigne[0]->nblignesfrais;
		if($nb == 0){
			$ok = true;
		}
		return $ok;
	}
/**
 * Retourne le dernier mois en cours d'un visiteur
 
 * @param $idVisiteur 
 * @return le mois sous la forme aaaamm
*/	
	public function dernierMoisSaisi($idVisiteur){
		$req = "select max(mois) as dernierMois from fichefrais where fichefrais.idvisiteur = :idVisiteur";
		$laLigne = DB::select($req, ['idVisiteur'=>$idVisiteur]);
                $dernierMois = $laLigne[0]->dernierMois;
		return $dernierMois;
	}
	
/**
 * Crée une nouvelle fiche de frais et les lignes de frais au forfait pour un visiteur et un mois donnés
 
 * récupère le dernier mois en cours de traitement, met à 'CL' son champs idEtat, crée une nouvelle fiche de frais
 * avec un idEtat à 'CR' et crée les lignes de frais forfait de quantités nulles 
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
*/
	public function creeNouvellesLignesFrais($idVisiteur,$mois){
		$dernierMois = $this->dernierMoisSaisi($idVisiteur);
		$laDerniereFiche = $this->getLesInfosFicheFrais($idVisiteur,$dernierMois);
		if($laDerniereFiche->idEtat=='CR'){
                    
                    // Clôture du Mois
                    $this->clotureDuDernierMois($dernierMois, $idVisiteur);
                    //$this->majEtatFicheFrais($idVisiteur, $dernierMois,'CL');
				
		}
		$req = "insert into fichefrais(idvisiteur,mois,nbJustificatifs,montantValide,dateModif,idEtat) 
		values(:idVisiteur,:mois,0,0,now(),'CR')";
		DB::insert($req, ['idVisiteur'=>$idVisiteur, 'mois'=>$mois]);
		$lesIdFrais = $this->getLesIdFrais();
		foreach($lesIdFrais as $uneLigneIdFrais){
			$unIdFrais = $uneLigneIdFrais->idfrais;
			$req = "insert into lignefraisforfait(idvisiteur,mois,idFraisForfait,quantite) 
			values(:idVisiteur,:mois,:unIdFrais,0)";
			DB::insert($req, ['idVisiteur'=>$idVisiteur, 'mois'=>$mois, 'unIdFrais'=>$unIdFrais]);
		 }
	}
        
           // Fonction de Somme des Frais (Hors Forfait aussi) du Mois Dernier
    public function clotureDuDernierMois($dernierMois,$idVisiteur)
    {
        $req = "Select sum(quantite*montant) as montantFrais From lignefraisforfait Inner Join fraisforfait On lignefraisforfait.idFraisForfait = fraisforfait.id
                Where mois =:dernierMois and idVisiteur =:visiteur";
        $req2 = "Select Sum(montant)as montantHors From lignefraishorsforfait Where mois = :dernierMois and idVisiteur = :visiteur ";
        
        $LignesForfait = DB::select($req,['dernierMois'=>$dernierMois, "visiteur"=>$idVisiteur]);
        $SommeHorsForfait = DB::select($req2,['dernierMois'=>$dernierMois, "visiteur"=>$idVisiteur]);
        
        $Summ = $LignesForfait[0]->montantFrais;
        $SummHors = $SommeHorsForfait[0]->montantHors;
        
        $total = $Summ+$SummHors;
        
        //Mise à jour de la FicheFrais
        $req3 = "Update fichefrais 
                 Set montantValide = :total, idEtat = 'CL'
                 Where idVisiteur = :visiteur and mois = :mois";
        
        Db::update($req3,["total"=>$total,"visiteur"=>$idVisiteur,"mois"=>$dernierMois]);
    }
        
        
/**
 * Crée un nouveau frais hors forfait pour un visiteur un mois donné
 * à partir des informations fournies en paramètre
 
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
 * @param $libelle : le libelle du frais
 * @param $date : la date du frais au format français jj//mm/aaaa
 * @param $montant : le montant
*/
	public function creeNouveauFraisHorsForfait($idVisiteur,$mois,$libelle,$date,$montant){
//		$dateFr = dateFrancaisVersAnglais($date);
		$req = "insert into lignefraishorsforfait(idVisiteur, mois, libelle, date, montant) 
		values(:idVisiteur,:mois,:libelle,:date,:montant)";
		DB::insert($req, ['idVisiteur'=>$idVisiteur, 'mois'=>$mois, 'libelle'=>$libelle,'date'=>$date,'montant'=>$montant]);
	}

/**
 * Récupère le frais hors forfait dont l'id est passé en argument
 * @param $idFrais 
 * @return un objet avec les données du frais hors forfait
*/
	public function getUnFraisHorsForfait($idFrais){
		$req = "select * from lignefraishorsforfait where lignefraishorsforfait.id = :idFrais ";
		$fraisHF = DB::select($req, ['idFrais'=>$idFrais]);
//                print_r($unfraisHF);
                $unFraisHF = $fraisHF[0];
                return $unFraisHF;
	}
/**
 * Modifie frais hors forfait à partir de son id
 * à partir des informations fournies en paramètre
 * @param $id 
 * @param $libelle : le libelle du frais
 * @param $date : la date du frais au format français jj//mm/aaaa
 * @param $montant : le montant
*/
	public function modifierFraisHorsForfait($id, $libelle,$date,$montant){
//		$dateFr = dateFrancaisVersAnglais($date);
		$req = "update lignefraishorsforfait set libelle = :libelle, date = :date, montant = :montant
		where id = :id";
		DB::update($req, ['libelle'=>$libelle,'date'=>$date,'montant'=>$montant, 'id'=>$id]);
	}
        
/**
 * Supprime le frais hors forfait dont l'id est passé en argument
 * @param $idFrais 
*/
	public function supprimerFraisHorsForfait($idFrais){
		$req = "delete from lignefraishorsforfait where lignefraishorsforfait.id = :idFrais ";
		DB::delete($req, ['idFrais'=>$idFrais]);
	}
/**
 * Retourne les fiches de frais d'un visiteur à partir d'un certain mois
 * @param $idVisiteur 
 * @param $mois mois début
 * @return un objet avec les fiches de frais de la dernière année
*/
	public function getLesFrais($idVisiteur, $mois){
		$req = "select * from  fichefrais where idvisiteur = :idVisiteur
                and  mois >= :mois   
		order by fichefrais.mois desc ";
                $lesLignes = DB::select($req, ['idVisiteur'=>$idVisiteur, 'mois'=>$mois]);
                return $lesLignes;
	}
/**
 * Retourne les informations d'une fiche de frais d'un visiteur pour un mois donné
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
 * @return un objet avec des champs de jointure entre une fiche de frais et la ligne d'état 
*/	
	public function getLesInfosFicheFrais($idVisiteur,$mois){
		$req = "select ficheFrais.idEtat as idEtat, ficheFrais.dateModif as dateModif, ficheFrais.nbJustificatifs as nbJustificatifs, 
			ficheFrais.montantValide as montantValide, etat.libelle as libEtat from  fichefrais inner join Etat on ficheFrais.idEtat = Etat.id 
			where fichefrais.idvisiteur = :idVisiteur and fichefrais.mois = :mois";
		$lesLignes = DB::select($req, ['idVisiteur'=>$idVisiteur,'mois'=>$mois]);			
		return $lesLignes[0];
	}
/** 
 * Modifie l'état et la date de modification d'une fiche de frais
 * Modifie le champ idEtat et met la date de modif à aujourd'hui
 * @param $idVisiteur 
 * @param $mois sous la forme aaaamm
 */
 
	public function majEtatFicheFrais($idVisiteur,$mois,$etat){
		$req = "update ficheFrais set idEtat = :etat, dateModif = now() 
		where fichefrais.idvisiteur = :idVisiteur and fichefrais.mois = :mois";
		DB::update($req, ['etat'=>$etat, 'idVisiteur'=>$idVisiteur, 'mois'=>$mois]);
	}
        
        public function setNouveauMdp($mdp, $login){
            $req = "update visiteur set mdp=:mdp where login = :login";
            DB::update($req,['mdp'=>$mdp, 'login'=>$login]);
        }
        
/*
 * Toutes les méthodes de valider fiche frais
 */
        
        public function getVisiteurEtatCloture($etat){
            $req = "select idVisiteur, mois, nom, prenom, montantValide"
                    . " from visiteur inner join fichefrais on visiteur.id = fichefrais.idVisiteur "
                    . "where idEtat = :etat order by nom ASC";
            $lesLignes = DB::select($req,['etat'=>$etat]);
            return $lesLignes;
        }
        
        public function getFicheForfait($id, $mois){
            $req = "select idVisiteur,quantite, idFraisForfait, montant from lignefraisforfait inner join fraisforfait on lignefraisforfait.idFraisForfait = fraisforfait.id where idVisiteur = :id and mois = :mois";
            $lesLignes = DB::select($req,['id'=>$id, 'mois'=>$mois]);
            return $lesLignes;
        }
        
        public function getFicheHfVisiteur($id, $mois){
        $req = "select id,libelle, date, montant from lignefraishorsforfait where idVisiteur = :id and mois = :mois and ISNULL(Suppr)";
        $lesLignes = DB::select($req,['id'=>$id, 'mois'=>$mois]);
        return $lesLignes;
        }
        
        public function valideFicheFrais($id, $mois){
            $req = "update fichefrais set idEtat = 'VA', dateModif= now() where idVisiteur = :id and mois = :mois";
            DB::update($req,['id'=>$id, 'mois'=>$mois]);
        }
           
        public function ModifierFicheFrais($montant, $id){
            $req = "update fraisforfait set montant = :montant where id = :id";
            DB::update($req,['montant'=>$montant, 'id'=>$id]);
        }
        
        public function SupprimerHorsForfait($libelle, $id, $date, $motif){
            $req = "update lignefraishorsforfait set Suppr = 1, MotifsSuppr = :motif where libelle= :libelle and date = :date and id = :id";
            DB::update($req,['motif'=>$motif,'libelle'=>$libelle, 'date'=>$date, 'id'=>$id]);
        }
        
        /* PRENDRE LES DIFFERENTE DONNEE */
        public function getDonnee($id, $mois){
            $req = "select nbJustificatifs, montantValide, dateModif from fichefrais where idVisiteur = :id and mois = :mois";
            $result = DB::select($req,['id'=>$id, 'mois'=>$mois]);
            return $result;
        }

       //public function getListeVisiteur()
       // {
        
        /*public function getListeVisiteur(){
            $req = "Select Distinct nom, prenom,id From visiteur Inner Join fichefrais On visiteur.id = fichefrais.idVisiteur
                   Where fichefrais.idEtat in ('RB','VA')Order by id,nom,prenom ";
            $resultat = DB::select($req);
            return $resultat;
        }
        */
        
        public function getFichesVisiteur(){
            
            $year = date('y');
            $year = $year -1;
            $month = date('m');
            
            $date = $year.$month;
            
            //$req="Select * from fichefrais where idVisiteur = :visiteur and mois >= :mois";
            $req = "Select * from fichefrais Inner Join visiteur On idVisiteur = id Where mois >= :mois Order by idVisiteur,mois";
            $ListeFiches = DB::select($req,['mois'=>$date]);
            
            return $ListeFiches;
        }
        
        
        public function getDetailFichesForfait($mois,$idVisiteur)
        {
            $req = "Select * From lignefraisforfait   where mois = :mois and idVisiteur = :visiteur";
            $Fiche = DB::select($req, ['mois'=>$mois,'visiteur'=>$idVisiteur]);
            return $Fiche;
        }
        
        public function getDetailFichesHorsForfait($mois,$idVisiteur)
        {
            $req = "Select * From lignefraishorsforfait   where mois = :mois and idVisiteur = :visiteur";
            $Fiche = DB::select($req, ['mois'=>$mois,'visiteur'=>$idVisiteur]);
            return $Fiche;
        }
}

