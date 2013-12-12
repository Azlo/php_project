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
			"titre_original" => str_replace("&", "et", $res->titre_original),
			"realisateur" => str_replace("&", "et", $res->realisateur),
			"date" => $res->date,
			"code_film" => $res->code_film,
		);
	}

	$monXml = "";
 
	foreach($tableau as $info)
	{
		$titre_original = $info['titre_original'];
		$realisateur = $info['realisateur'];
		$date = $info['date'];
		$code_film = $info['code_film'];
		$affichage='';

		$affichage = $monXml .='<film>' . "\n";
		$affichage = $monXml .="\t".'<titre_original>'. utf8_encode(rtrim($titre_original)) .'</titre_original>' . "\n";
		$affichage = $monXml .="\t".'<realisateur>'. utf8_encode(rtrim($realisateur)) .'</realisateur>' . "\n";
		$affichage = $monXml .="\t".'<date>'. utf8_encode(rtrim($date)) .'</date>' . "\n";
		$affichage = $monXml .='</film>' . "\n";

		echo $affichage;

		utf8_encode($monXml);


		if ($fp = fopen("ESSAI.xml",'w'))
		{
		 fputs($fp,$monXml);
		 fclose($fp);
		}
}
?>
</liste>
