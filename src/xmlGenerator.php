<!doctype html>
<html>
	<head>
		<title>Liste de films</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.min.css"/>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../select_2/select2.css" />
	</head>

	<body>
		<?php
		// Fichier nécessaire à la connexion à la base de données
			require_once("connect.php");
		// On récupère la requête de la page précédente
			$sql = $_POST["postQuery"];


		// Connexion à la base
			try{
				$connexion = new PDO(DSN,USER,PASSWD);
			}
			catch(PDOException $e){
				printf("Échec de la connexion : %s\n", $e->getMessage());
				exit();
			}

		// Execution de la requête récupéré via $_POST
			$stmt = $connexion->prepare($sql);
			$stmt -> execute();
			$tableau;

		// On construit un tableau associatif avec les résultats
			while($res=$stmt->fetch(PDO::FETCH_OBJ)) {
				$tableau[] = array (
					"titre_original" => str_replace("&", "et", $res->titre_original),
					"titre_francais" => str_replace("&", "et", $res->titre_francais),
					"realisateur" => 	str_replace("&", "et", $res->realisateur),
					"date" => 			$res->date,
					"code_film" => 		$res->code_film,
				);
			}
		// Initialisation de la chaine de caractère
			$monXml='';
		// Déclaration du type de document
			$monXml .= "<?xml version=\"1.0\" encoding=\"utf8\" standalone=\"yes\" ?>\n";
		// DTD du document xml
			$xmlDTD ="<!DOCTYPE liste_film [\n<!ELEMENT liste_film (film)+ >\n<!ELEMENT film (titre_original,titre_francais,realisateur,date)+ >\n<!ELEMENT titre_original (#PCDATA) >\n<!ELEMENT titre_francais (#PCDATA) >\n<!ELEMENT realisateur (#PCDATA) >\n<!ELEMENT date (#PCDATA) >\n]>\n";
			$monXml .= $xmlDTD;
		// On place l'élément racine
			$monXml .= "<liste_film>\n";

		// Pour chaque élément du tableau, on le place dans la chaine
			foreach($tableau as $info)
			{
				$titre_original = 	$info['titre_original'];
				$titre_francais = 	$info['titre_francais'];
				$realisateur = 		$info['realisateur'];
				$date = 			$info['date'];
				$code_film = 		$info['code_film'];

				$monXml .= "\t<film>\n";
				$monXml .= "\t\t" . '<titre_original>'.		utf8_encode(rtrim($titre_original)).	'</titre_original>' . "\n";
				$monXml .= "\t\t" . '<titre_francais>'.		utf8_encode(rtrim($titre_francais)).	'</titre_francais>' . "\n";
				$monXml .= "\t\t" . '<realisateur>'.		utf8_encode(rtrim($realisateur)).		'</realisateur>' . "\n";
				$monXml .= "\t\t" . '<date>'.				utf8_encode(rtrim($date)).				'</date>' . "\n";
				$monXml .= "\t</film>\n";
			}

		// Fermeture de la balise racine
			$monXml .= "</liste_film>";

		// Encodage de la chaine
			utf8_encode($monXml);

		// On ouvre un fichier en mode écriture, et l'on y place la chaine de caractère
			if ($fp = fopen("../xml/export_film.xml",'w'))
			{
				fputs($fp,$monXml);
				fclose($fp);
			}
		// déclaration d'un objet DOM pour la validation
			$dom = new DOMDocument;
			$path = "../xml/export_film.xml";
			$dom->Load($path);

?>
<br/><br/>
		<div class="container">
<?php
		// On test si le document est valide
			if ($dom->validate()) {
		// Si oui, succès
?>
			<div class="alert alert-success">
				<h3>Ce document est valide !</h3>
			</div>
			<div class="jumbotron">
				<p>Le document xml se trouve dans projet_php/xml sous le nom "export_film.xml".</p>
			</div>
<?php
			}
			else {
		// Si non, erreur
?>
				<div class="alert alert-danger">
				<h3>Ce document est invalide !</h3>
				</div>
<?php
			}
?>
		</div>

		<script language="javascript" type="text/javascript" src="../jquery/jquery-min.js"></script>
		<script language="javascript" type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>