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
	$stmt = $connexion->prepare($sql);
	$stmt -> execute();
	$tableau;

	while($res=$stmt->fetch(PDO::FETCH_OBJ)) {
		$tableau[] = array (
			"titre_original" => $res['titre_original'],
			"realisateur" => $res['realisateur'],
			"date" => $res['date'],
			"code_film" => $res['code_film'],
		);
	}
 
	//Parcour le tableau pour en extraire les données
	foreach($tableau as $info)
	{
		$titre_original = $info['titre_original'];
		$realisateur = $info['realisateur'];
		$date = $info['date'];
		$code_film = $info['code_film'];
?>
		<film>
			<titre_original><?php echo $titre_original; ?></titre_original>
			<realisateur><?php echo $realisateur; ?></realisateur>
			<date><?php echo $date; ?></date>
		</film>
<?php
	//Fermeture de la boucle qui parcour le tableau
}
?>
</liste>







