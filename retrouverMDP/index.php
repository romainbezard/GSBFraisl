<?php
$bdd = new PDO('mysql:host=localhost;dbname=gsb_frais','root','');
$bddNew = new PDO('mysql:host=localhost;dbname=gsb_frais_new1','root','');


echo " Copie de la colonne N°2 de TableOrg dans le colonne N°2 de TableDest <br>";

$query  = "SELECT mdp, id FROM visiteur";
$result1 = $bdd->query($query);
 
$data = $result1->fetchAll();
 
 
$query2  = "SELECT mdp , id FROM visiteur";
$result2= $bddNew->query($query2);
 
$data2 = $result2->fetchAll();
 
 
foreach($data as $u)
{
	print_r($u[1]);
	$query3="UPDATE visiteur SET mdp=:mdp where id=:id";
	$ref = $bddNew->prepare($query3);
	$ref->bindParam(':mdp',$u[0]);
	$ref->bindParam(':id',$u[1]);
	$ref->execute();
	$result = $bddNew->query($query3);
}

?>