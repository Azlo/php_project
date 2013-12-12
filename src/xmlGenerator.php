<?php  
	Header("Content-type: text/xml" );
	echo '<?xml version="1.0" encoding="utf8"?>';
	require_once("connect.php");
	$sql = $_POST["postQuery"];
?>
 
<liste>
<?php

	try{
		$connexion = new PDO(DSN,USER,PASSWD);
	}
	catch(PDOException $e){
		printf("Échec de la connexion : %s\n", $e->getMessage());
		exit();
	}
	$sql = "SELECT * FROM genres";
	$stmt = $connexion->prepare($sql);
	$stmt -> execute();

	while($res=$stmt->fetch(PDO::FETCH_OBJ)) {
		$tableau[] = array (
			"nom" => $liste['nom'],
			"email" => $liste['email'],
			"prenom" => $liste['prenom'],
			"id" => $liste['id'],
		);
	}
		echo "\t\t\t\t" . '<option>' . utf8_encode($res->nom_genre) . '</option>'."\n";

 

while($liste = mysql_fetch_array($query))
{
	$tableau[] = array (
		"nom" => $liste['nom'],
		"email" => $liste['email'],
		"prenom" => $liste['prenom'],
		"id" => $liste['id'],
	);
}
 /*
//Parcour le tableau pour en extraire les données
foreach($tableau as $info)
{
	$nom = $info['nom'];
	$email = $info['email'];
	$prenom = $info['prenom'];
	$id = $info['id'];
?>
	<contact>
		<prenom><?php echo $prenom; ?></prenom>
		<nom><?php echo $nom; ?></nom>
		<email><?php echo $email; ?></email>
	</contact>
<?php
//Fermeture de la boucle qui parcour le tableau
}*/
?>
<contact>
  <prenom>Maxime</prenom>
  <nom>LADRA</nom>
  <email>maxime.ladra@fai.com</email>
 </contact>
 <contact>
 
  <prenom>Julien</prenom>
  <nom>CHADOURNE</nom>
  <email>JULIEN.CHADROUNE@XXX.COM</email>
 </contact>
 <contact>
  <prenom>Julien</prenom>
  <nom>Rideaud</nom>
 
  <email>Julien.Rideaud@mail.com</email>
 </contact>
 <contact>
  <prenom>Celine</prenom>
  <nom>Chamaillard</nom>
  <email>maildeceline@mail.com</email>
 </contact> 
</liste>