<?php 


	$bdd = new PDO('mysql:host=localhost;dbname=gsb_frais_new1','root','');
	$mdpMD5="";
	
	try
	{
		$request = "Select mdp,id from visiteur";
		$a= $bdd->query($request);
		$resultat= $a->fetchAll();
		
		
		$request_2="";
		foreach($resultat as $u)
		{
			$mdpMD5=MD5($u[0]);
			$request_2="Update visiteur Set mdp= :mdp where id = :id";
			$ref=$bdd->prepare($request_2);
			$ref->bindParam(':mdp',$mdpMD5);
			$ref->bindParam(':id',$u[1]);
			$ref->execute();
			print_r($u[1]);
		}
		echo "Travail bien fait ! ";
		
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}

	

?>