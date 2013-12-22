<!doctype html>
<html>
<?php include_once('head.php'); ?>

	<body>

<?php
// **********************************
// ***************MENU**************
// **********************************
		// On inclue le menu de navigation
			include_once("nav.php");
		// On inclue le fichier de connexion
			require_once("connect.php");

		// Connexion à la base
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
		<div class="container">
			<form method="POST" action="" class="from-search well form-inline">
			<fieldset>
				<legend>Rechercher un film</legend>

					<?php // Listes déroulantes ?>
					<div class="row">
						<?php // GENRE ?>
						<div class="control-group col-6 col-sm-6 col-lg-4">
							<label for="e1" class="control-label">Genres</label>
							<div class="controls">
								<p><select id="e1" name="genres" class="selectpicker">
									<option></option>
									<?php
										$sql = "SELECT * FROM genres";
										$stmt = $connexion->prepare($sql);
										$stmt -> execute();

										while($res=$stmt->fetch(PDO::FETCH_OBJ))
											echo "\t\t\t\t" . '<option value="' . $res->code_genre . '">' . utf8_encode($res->nom_genre) . '</option>'."\n";
									?>
								</select></p>
							</div>
						</div>


						<?php // PAYS ?>
						<div class="control-group col-6 col-sm-6 col-lg-4">
							<label for="e2" class="control-label">Pays</label>
							<div class="controls">
								<p><select id="e2" name="pays" class="selectpicker">
									<option></option>
									<?php
										$sql = "SELECT distinct pays FROM films";
										$stmt = $connexion->prepare($sql);
										$stmt -> execute();

										while($res=$stmt->fetch(PDO::FETCH_OBJ))
											echo "\t\t\t\t".'<option value="'.utf8_encode($res->pays).'">' . utf8_encode($res->pays) . '</option>'."\n";
									?>
								</select></p>
							</div>
						</div>


						<?php // ACTEUR ?>
						<div class="control-group col-6 col-sm-6 col-lg-4">
							<label for="e3" class="control-label">Acteur</label>
							<div class="controls">
								<p><select id="e3" name="acteurs" class="selectpicker">
									<option></option>
									<?php
										$sql = "SELECT distinct code_indiv, nom, prenom FROM individus i, acteurs a WHERE i.code_indiv = a.ref_code_acteur ORDER BY prenom";
										$stmt = $connexion->prepare($sql);
										$stmt -> execute();

										while($res=$stmt->fetch(PDO::FETCH_OBJ))
											echo "\t\t\t\t".'<option value="' . $res->code_indiv . '">' . utf8_encode($res->prenom) . ' ' . utf8_encode($res->nom) . '</option>'."\n";
									?>
								</select></p>
							</div>
						</div>


						<?php // REALISATEUR ?>
						<div class="control-group col-6 col-sm-6 col-lg-4">
							<label for="e4" class="control-label">Réalisateur</label>
							<div class="controls">
								<p><select id="e4" name="realisateur" class="selectpicker">
									<option></option>
									<?php
										$sql = "SELECT distinct code_indiv, nom, prenom FROM individus i, films f WHERE i.code_indiv = f.realisateur ORDER BY prenom";
										$stmt = $connexion->prepare($sql);
										$stmt -> execute();

										while($res=$stmt->fetch(PDO::FETCH_OBJ))
											echo "\t\t\t\t".'<option value="' . utf8_encode($res->code_indiv) . '">' . utf8_encode($res->prenom) . ' ' . utf8_encode($res->nom) . '</option>'."\n";
									?>
								</select></p>
							</div>
						</div>


						<?php // DATE ?>
						<div class="control-group col-6 col-sm-6 col-lg-4">
							<label for="e5" class="control-label">Date</label>
							<div class="controls">
								<p><select id="e5" name="date" class="selectpicker">
									<option></option>
									<?php
										$sql = "SELECT distinct date FROM films	ORDER BY date";
										$stmt = $connexion->prepare($sql);
										$stmt -> execute();

										while($res=$stmt->fetch(PDO::FETCH_OBJ))
											echo "\t\t\t\t".'<option value="'.utf8_encode($res->date).'">' . utf8_encode($res->date) . '</option>'."\n";
									?>
								</select></p>
							</div>
						</div>


						<?php // COULEUR ?>
						<div class="control-group col-6 col-sm-6 col-lg-4">
							<label for="e6" class="control-label">Couleur</label>
							<div class="controls">
								<p><select id="e6" name="couleur" class="selectpicker">
									<option></option>
									<?php
										$sql = "SELECT distinct couleur FROM films";
										$stmt = $connexion->prepare($sql);
										$stmt -> execute();

										$a=0;
										while($res=$stmt->fetch(PDO::FETCH_OBJ))
											echo "\t\t\t\t".'<option value="' . utf8_encode($res->couleur) . '">' . utf8_encode($res->couleur) . '</option>'."\n";
									?>
								</select></p>
							</div>
						</div>
					</div>

					<?php // Input rechercher ?>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-6">
						<label for="recherche" class="control-label">Recherche par titre</label>
							<div class="input-group">
							<input id="recherche" type="text" class="form-control" name="recherche">
								<span class="input-group-btn">
									<button class="btn btn-primary btn-large" type="submit"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
								</span>
							</div>
						</div>
					</div>

			<?php
// **********************************
// *******CONSTRUCTION REQUETE*******
// **********************************
					if (!empty($_POST)) {
						include_once("ressources.php");
						$sql = queryBuild();
					}
					else {
						$sql="SELECT code_film, titre_original, titre_francais, pays, date, duree, couleur, realisateur, image, Irealisateur.nom AS nomRealisateur, Irealisateur.prenom AS prenomRealisateur
							FROM films f, individus Irealisateur
							WHERE f.realisateur=Irealisateur.code_indiv";
					}

					$stmt=$connexion->prepare($sql);
					$stmt->execute();
				?>
			</fieldset>
			</form>
		</div>


<?php
// **********************************
// *********TABLEAU DE FILMS*********
// **********************************

// On récupère un résultat
$res = $stmt -> fetch(PDO::FETCH_OBJ);

// S'il n'est pas vide ona ffiche le tableau avec le/les résultat(s)
if (!empty($res)) {

// On place lê "head" du tableau
?>
					<table class="table-hover table-bordered table-stripped table tablesorter text-center center">
						<thead >
							<tr>
								<th>Titre Fançais</th>
								<th>Titre Original</th>
								<th>Pays</th>
								<th>Date</th>
								<th>Durée (min)</th>
								<th>Couleur</th>
								<th>Réalisateur</th>
								<th>Image</th>
							</tr>
						</thead>
						<tbody>
<?php
					do{ // On utilise le "do while" car il faut consommer un résultat pour savoir s'il existe
						echo "\t<tr>\n";
						echo "\t\t" . '<td><a href="http://www.allocine.fr/recherche/?q=' . utf8_encode($res->titre_francais).
							'" target="blank">' . utf8_encode($res->titre_francais) . '</a></td>'."\n";
						echo "\t\t<td>" . utf8_encode($res->titre_original) . 	"</td>\n";
						echo "\t\t<td>" . utf8_encode($res->pays) . 			"</td>\n";
						echo "\t\t<td>" . utf8_encode($res->date) . 			"</td>\n";
						echo "\t\t<td>" . utf8_encode($res->duree) . 			"</td>\n";
						echo "\t\t<td>" . utf8_encode($res->couleur) . 			"</td>\n";
						echo "\t\t<td>" . utf8_encode($res->prenomRealisateur) . 
										  utf8_encode($res->nomRealisateur) .	"</td>\n";
						// Si l'image existe, on affiche la bonne image
						if (file_exists('../images/'.$res->code_film.'.jpg')) {
							echo "\t\t<td><img src=\"../images/".$res->code_film.".jpg\"></td>\n";
						}
						else { // Sinon on affiche une image par défaut
							echo "\t\t<td><img src=\"../images/empty.jpg\" width=\"120\"></td>\n";
						}
						echo "\t</tr>\n";
					}while($res = $stmt -> fetch(PDO::FETCH_OBJ));
					echo "</table>\n";

					// Fermeture du curseur
					$stmt->closeCursor();
?>
						</tbody>
		<div class="container col-lg-2 col-md-2 col-sm-2">
			<div class="well">
				<form method="POST" action="xmlGenerator.php">
					<label for="inputcache" class="control-label">Export XML</label>
					<input id="inputcache" type="hidden" name="postQuery" value="<?php echo $sql; ?>"><br/>
					<input class="btn btn-primary" type="submit" value="Export XML">
				</form>
			</div>
		</div>
<?php
}
// Sinon on affiche "aucun résultats"
else {
?>
	<div class="container">
		<div class="well">
			<h3 style="text-align:center">Aucun résultats !</h3>
		</div>
	</div>
<?php
}
?>

		<?php include_once('footer.php'); ?>
		<script language="javascript" type="text/javascript" src="../jquery/jquery-min.js"></script>
		<script language="javascript" type="text/javascript" src="../dist/js/bootstrap.min.js"></script>
		<script language="javascript" type="text/javascript" src="../select_2/select2.js"></script>
		<script language="javascript" type="text/javascript" src="../jquery/__jquery.tablesorter/jquery.tablesorter.js"></script>
		<script>
<?php
// **********************************
// ****INITIALISATION DES SELECTS****
// **********************************

// La librairie "Select2" est utilisé, on les initialise avec diverses options en javascript
?>
			$(document).ready(function() { 
				$("#e1").select2({ placeholder: "genre",		allowClear: true,	width:'250'});
				$("#e2").select2({ placeholder: "pays",			allowClear: true,	width:'250'});
				$("#e3").select2({ placeholder: "acteur",		allowClear: true,	width:'250'});
				$("#e4").select2({ placeholder: "réalisateur",	allowClear: true,	width:'250'});
				$("#e5").select2({ placeholder: "date",			allowClear: true,	width:'250'});
				$("#e6").select2({ placeholder: "couleur",		allowClear: true,	width:'250'});
				$("table").tablesorter({
					sortList: [[0,0]]
				});
			});

			<?php
// **********************************
// ******MISE EN MEMOIRE REQUETE*****
// **********************************

// Si la donnée post existe, on la garde en mémoire si l'utilisateur veut affiner sa recherche
				if (!empty($_POST)) {
					if (!empty($_POST["genres"])){
						$genres = $_POST["genres"];
						echo '$("#e1").val('.$genres.');';
					}
					if (!empty($_POST["pays"])){
						$pays = $_POST["pays"];
						echo '$("#e2").val("'.$_POST["pays"].'");';
					}
					if (!empty($_POST["acteurs"])){
						$acteurs = $_POST["acteurs"];
						echo '$("#e3").val('.$_POST["acteurs"].');';
					}
					if (!empty($_POST["realisateur"])){
						$realisateur = $_POST["realisateur"];
						echo '$("#e4").val('.$_POST["realisateur"].');';
					}
					if (!empty($_POST["date"]))	{
						$date = $_POST["date"];
						echo '$("#e5").val('.$_POST["date"].');';
					}
					if (!empty($_POST["couleur"])){
						$couleur = $_POST["couleur"];
						echo '$("#e6").val("'.$_POST["couleur"].'");';
					}
				}
			?>
		</script>
	</body>
</html>