<!doctype html>
<html>
	<head>
		<title>Liste de films</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css"/>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../select_2/select2.css" />
	</head>

	<body>
	<?php
		// Connexion à la base
		require_once("connect.php");
		
			try{
				$connexion = new PDO(DSN,USER,PASSWD);
			}
			catch(PDOException $e){
				printf("Échec de la connexion : %s\n", $e->getMessage());
				exit();
			}
	?>
	<?php
// **********************************
// ************FORMULAIRE************
// **********************************
	?>
		<form method="POST" action="">

			<?php // Input rechercher ?>
			<input class="span" name="recherche" type="text">

			<?php // Listes déroulantes ?>

			<?php // GENRE ?>
			<select id="e1" name="genres" class="selectpicker span2">
				<option></option>
				<?php
					$sql = "SELECT * FROM genres";
					$stmt = $connexion->prepare($sql);
					$stmt -> execute();

					while($res=$stmt->fetch(PDO::FETCH_OBJ))
						echo "\t\t\t\t" . '<option value="' . $res->code_genre . '">' . utf8_encode($res->nom_genre) . '</option>'."\n";
				?>
			</select>
			
			<?php // PAYS ?>
			<select id="e2" name="pays" class="selectpicker span2">
				<option></option>
				<?php
					$sql = "SELECT distinct pays FROM films";
					$stmt = $connexion->prepare($sql);
					$stmt -> execute();

					while($res=$stmt->fetch(PDO::FETCH_OBJ))
						echo "\t\t\t\t".'<option>' . utf8_encode($res->pays) . '</option>'."\n";
				?>
			</select>

			<?php // ACTEUR ?>
			<select id="e3" name="acteurs" class="selectpicker span2">
				<option></option>
				<?php
					$sql = "SELECT distinct code_indiv, nom, prenom FROM individus i, acteurs a WHERE i.code_indiv = a.ref_code_acteur ORDER BY prenom";
							
					$stmt = $connexion->prepare($sql);
					$stmt -> execute();

					while($res=$stmt->fetch(PDO::FETCH_OBJ))
						echo "\t\t\t\t".'<option value="' . $res->code_indiv . '">' . utf8_encode($res->prenom) . ' ' . utf8_encode($res->nom) . '</option>'."\n";
				?>
			</select>

			<?php // REALISATEUR ?>
			<select id="e4" name="realisateur" class="selectpicker span2">
				<option></option>
				<?php
					$sql = "SELECT distinct code_indiv, nom, prenom FROM individus i, films f WHERE i.code_indiv = f.realisateur ORDER BY prenom";
							
					$stmt = $connexion->prepare($sql);
					$stmt -> execute();

					while($res=$stmt->fetch(PDO::FETCH_OBJ))
						echo "\t\t\t\t".'<option value="' . utf8_encode($res->code_indiv) . '">' . utf8_encode($res->prenom) . ' ' . utf8_encode($res->nom) . '</option>'."\n";
				?>
			</select>

			<?php // DATE ?>
			<select id="e5" name="date" class="selectpicker span2">
				<option></option>
				<?php
					$sql = "SELECT distinct date FROM films	ORDER BY date";
							
					$stmt = $connexion->prepare($sql);
					$stmt -> execute();

					while($res=$stmt->fetch(PDO::FETCH_OBJ))
						echo "\t\t\t\t".'<option>' . utf8_encode($res->date) . '</option>'."\n";
				?>
			</select>

			<?php // COULEUR ?>
			<select id="e6" name="couleur" class="selectpicker span2">
				<option></option>
				<?php
					$sql = "SELECT distinct couleur FROM films";
							
					$stmt = $connexion->prepare($sql);
					$stmt -> execute();

					while($res=$stmt->fetch(PDO::FETCH_OBJ))
						echo "\t\t\t\t".'<option>' . utf8_encode($res->couleur) . '</option>'."\n";
				?>
			</select>

			<?php // BOUTON SUBMIT ?>
			<input class="btn" type="submit" value="Rechercher"><br/>

				<?php
// **********************************
// *******CONSTRUCTION REQUETE*******
// **********************************
					
					if (!empty($_POST)) {
						include_once("ressources.php");
						$sql = queryBuild();
						echo "<br/>";
						echo "<br/>";
						echo "<br/>";
						echo "<br/>";
						echo "<br/>";
						var_dump($sql);
						echo "<br/>";
						echo "<br/>";
						echo "<br/>";
					}
					else {
						$sql="SELECT code_film, titre_original, titre_francais, pays, date, duree, couleur, realisateur, image, Irealisateur.nom AS nomRealisateur, Irealisateur.prenom AS prenomRealisateur
							FROM films f, individus Irealisateur
							WHERE f.realisateur=Irealisateur.code_indiv";
					}

					$stmt=$connexion->prepare($sql);
					$stmt->execute();
				?>
		</form>
<?php

// **********************************
// *********TABLEAU DE FILMS*********
// **********************************

					echo "<table class=\"table-hover table-bordered table-stripped table\">\n";
					echo "\t<tr>\n";
					echo "\t\t<th>Titre Fançais</th>\n";
					echo "\t\t<th>Titre Original</th>\n";
					echo "\t\t<th>Pays</th>\n";
					echo "\t\t<th>Date</th>\n";
					echo "\t\t<th>Durée</th>\n";
					echo "\t\t<th>Couleur</th>\n";
					echo "\t\t<th>Réalisateur</th>\n";
					echo "\t\t<th>Image</th>\n";
					echo "\t</tr>\n";
					while($res = $stmt -> fetch(PDO::FETCH_OBJ)){
						echo "\t<tr>\n";
						echo "\t\t" . '<td><a href="http://www.allocine.fr/recherche/?q=' . utf8_encode($res->titre_francais).
							'" target="blank">' . utf8_encode($res->titre_francais) . '</a></td>'."\n";
						echo "\t\t<td>" . utf8_encode($res->titre_original) . 	"</td>\n";
						echo "\t\t<td>" . utf8_encode($res->pays) . 			"</td>\n";
						echo "\t\t<td>" . utf8_encode($res->date) . 			"</td>\n";
						echo "\t\t<td>" . utf8_encode($res->duree) . 			"</td>\n";
						echo "\t\t<td>" . utf8_encode($res->couleur) . 			"</td>\n";
						echo "\t\t<td>" . utf8_encode($res->prenomRealisateur) . utf8_encode($res->nomRealisateur) ."</td>\n";
						echo "\t\t<td>" . utf8_encode($res->image) . 			"</td>\n";
						echo "\t</tr>\n";
					}
					echo "</table>\n";

					// Fermeture du curseur
					$stmt->closeCursor();

?>

		<form method="POST" action="xmlGenerator.php">
			<input type="hidden" name="postQuery" value="<?php echo $sql; ?>"><br/>
			<input class="btn" type="submit" value="Export XML">
		</form>

		<script language="javascript" type="text/javascript" src="../jquery/jquery-min.js"></script>
		<script language="javascript" type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
		<script language="javascript" type="text/javascript" src="../select_2/select2.js"></script>
		<script>
<?php
// **********************************
// ****INITIALISATION DES SELECTS****
// **********************************
?>
			$(document).ready(function() { 
				$("#e1").select2({ placeholder: " un genre",		allowClear: true});
				$("#e2").select2({ placeholder: " un pays",			allowClear: true});
				$("#e3").select2({ placeholder: " un acteur",		allowClear: true});
				$("#e4").select2({ placeholder: " un réalisateur",	allowClear: true});
				$("#e5").select2({ placeholder: " une date",		allowClear: true});
				$("#e6").select2({ placeholder: " une couleur",		allowClear: true});
			});

			<?php
// **********************************
// ******MISE EN MEMOIRE REQUETE*****
// **********************************
				if (!empty($_POST)) {
					if (!empty($_POST["genres"])) {		echo '$("#e1").val('.$_POST["genres"].');'		;};
					if (!empty($_POST["pays"])) {		echo '$("#e2").val('.$_POST["pays"].');'		;};
					if (!empty($_POST["acteurs"])) {	echo '$("#e3").val('.$_POST["acteurs"].');'		;};
					if (!empty($_POST["realisateur"])) {echo '$("#e4").val('.$_POST["realisateur"].');'	;};
					if (!empty($_POST["date"])) {		echo '$("#e5").val('.$_POST["date"].');'		;};
					if (!empty($_POST["couleur"])) {	echo '$("#e6").val('.$_POST["couleur"].');'		;};
					echo '$("#postQuery").val('.$sql.');';
				};
			?>
		</script>

	</body>
</html>