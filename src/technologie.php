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
?>


		<div class="jumbotron">
			<div class="container">
				<h1>Technologies utilisées !</h1>
				<p>Pour ce projet, différentes technologies ont été utilisées, nous avons pensé que les présenter dans cette rubrique ne ferait pas de mal.</p>
			</div>
		</div>
		<div id="bootstrap" class="container">
			<div class="well">
				<h2>Bootstrap</h2>
				<p>Agréable à l'oeil, intuitif et soigné, Bootstrap est un puissant framework CSS permettant un développement web plus rapide et plus facile. C'est l'un des projet les plus populaires de GitHub, créé chez Twitter par <a href="https://twitter.com/mdo">@mdo</a> et <a href="https://twitter.com/fat">@fat</a>.</p>
				<p>Nous l'avons choisi pour sa facilité d'utilisation et son ergonomie (parce qu'on trouvait ça joli en fait, on s'est beaucoup amusé avec).</p>
				<p><a class="btn btn-primary btn-lg" role="button" href="http://www.oneskyapp.com/docs/bootstrap/fr">Pour plus d'infos &raquo;</a></p>							
			</div>
		</div>
		<div id="php" class="container">
			<div class="well">
				<h2>PHP</h2>
				<p>PHP est un acronyme recursif pour PHP : Hypertext Preprocessor (le premier "P" de "PHP" veut dire "PHP", tout comme le "E" de "EINE", un dérivé de emacs, veut dire "EINE" pour "EINE Is Not Emacs", on a trouvé ça rigolo). Il s'agit d'un langage très populaire principalement utilisé pour produire à la volée des pages web.</p>
				<p>Nous l'avons utilisé parce que c'était le projet lui-même (on va pas faire du Django pour un projet php, ce serait bête hein ?).</p>
				<p><a class="btn btn-primary btn-lg" role="button" href="http://jquery.com/">En savoir plus &raquo;</a></p>
				<p>Pour récupérer les images, nous nous sommes aidé d'un script php trouvé sur le net qui permet de redimensionner les images (sinon ça aurait pris beaucoup de place) dont voici le code :</p>
				<pre><code>
function fctredimimage($W_max, $H_max, $rep_Dst, $img_Dst, $rep_Src, $img_Src) {
	// ----------------------------------------------------
	$condition = 1;
	// Si certains parametres ont pour valeur '' :
	if ($rep_Dst == '') { $rep_Dst = $rep_Src; } // (meme repertoire)
	if ($img_Dst == '') { $img_Dst = $img_Src; } // (meme nom)
	// ----------------------------------------------------
	// si le fichier existe dans le répertoire, on continue...
	if (file_exists($rep_Src.$img_Src) && ($W_max!=0 || $H_max!=0)) {
		// --------------------------------------------------
		// extensions acceptees :
		$ExtfichierOK = '" jpg jpeg png"'; // (l espace avant jpg est important)
		// extension fichier Source
		$tabimage = explode('.',$img_Src);
		$extension = $tabimage[sizeof($tabimage)-1]; // dernier element
		$extension = strtolower($extension); // on met en minuscule
		// --------------------------------------------------
		// extension OK ? on continue ...
		if (strpos($ExtfichierOK,$extension) != '') {
			// -----------------------------------------------
			// recuperation des dimensions de l image Src
			$img_size = getimagesize($rep_Src.$img_Src);
			$W_Src = $img_size[0]; // largeur
			$H_Src = $img_size[1]; // hauteur
			// -----------------------------------------------
			// condition de redimensionnement et dimensions de l image finale
			// -----------------------------------------------
			// A- LARGEUR ET HAUTEUR maxi fixes
			if ($W_max != 0 && $H_max != 0) {
				$ratiox = $W_Src / $W_max; // ratio en largeur
				$ratioy = $H_Src / $H_max; // ratio en hauteur
				$ratio = max($ratiox,$ratioy); // le plus grand
				$W = $W_Src/$ratio;
				$H = $H_Src/$ratio;  
				$condition = ($W_Src>$W) || ($W_Src>$H); // 1 si vrai (true)
			}
			// -----------------------------------------------
			// B- HAUTEUR maxi fixe
			if ($W_max == 0 && $H_max != 0) {
				$H = $H_max;
				$W = $H * ($W_Src / $H_Src);
				$condition = ($H_Src > $H_max); // 1 si vrai (true)
			}
			// -----------------------------------------------
			// C- LARGEUR maxi fixe
			if ($W_max != 0 && $H_max == 0) {
				$W = $W_max;
				$H = $W * ($H_Src / $W_Src);        
				$condition = ($W_Src > $W_max); // 1 si vrai (true)
			}
			// -----------------------------------------------
			// REDIMENSIONNEMENT si la condition est vraie
			// -----------------------------------------------
		// Si l'image Source est plus petite que les dimensions indiquees :
		// Par defaut : PAS de redimensionnement.
		// Mais on peut "forcer" le redimensionnement en ajoutant ici :
		// $condition = 1; (risque de perte de qualite)
		// -----------------------------------------------
			if ($condition == 1) {
			// --------------------------------------------
			// creation de la ressource-image "Src" en fonction de l extension
				switch($extension) {
					case 'jpg':
					case 'jpeg':
						$Ress_Src = imagecreatefromjpeg($rep_Src.$img_Src);
						break;
					case 'png':
						$Ress_Src = imagecreatefrompng($rep_Src.$img_Src);
						break;
				}
			// --------------------------------------------
			// creation d une ressource-image "Dst" aux dimensions finales
			// fond noir (par defaut)
				switch($extension) {
					case 'jpg':
					case 'jpeg':
						$Ress_Dst = imagecreatetruecolor($W,$H);
						break;
					case 'png':
						$Ress_Dst = imagecreatetruecolor($W,$H);
						// fond transparent (pour les png avec transparence)
						imagesavealpha($Ress_Dst, true);
						$trans_color = imagecolorallocatealpha($Ress_Dst, 0, 0, 0, 127);
						imagefill($Ress_Dst, 0, 0, $trans_color);
						break;
				}
				// --------------------------------------------
				// REDIMENSIONNEMENT (copie, redimensionne, re-echantillonne)
				imagecopyresampled($Ress_Dst, $Ress_Src, 0, 0, 0, 0, $W, $H, $W_Src, $H_Src);
				// --------------------------------------------
				// ENREGISTREMENT dans le repertoire (avec la fonction appropriee)
				switch ($extension) {
					case 'jpg':
					case 'jpeg':
						imagejpeg ($Ress_Dst, $rep_Dst.$img_Dst);
						break;
					case 'png':
						imagepng ($Ress_Dst, $rep_Dst.$img_Dst);
						break;
				}
				// --------------------------------------------
				// liberation des ressources-image
				imagedestroy ($Ress_Src);
				imagedestroy ($Ress_Dst);
			}
		// -----------------------------------------------
		}
	}
	// ---------------------------------------------------------------------------------------
	// si le fichier a bien ete cree
	if ($condition == 1 && file_exists($rep_Dst.$img_Dst)) { return true; }
	else { return false; }
}
				</code></pre>
				<p>Les images ont été redimensionnées en 160*120, nous avons pensé que cette taille était la plus idéal pour la lisibilité de l'affiche, et la place qu'elle prendrait dans le tableau</p>
			</div>
		</div>
		<div id="jquery" class="container">
			<div class="well">
				<h2>JQuery</h2>
				<p>JQuery est une librairie <a href="http://fr.wikipedia.org/wiki/JavaScript">JavaScript</a> rapide, légère et riche en fonctionnalités. Il rend le parcours et la manipulation d'un <a href="http://fr.wikipedia.org/wiki/Document_Object_Model">DOM</a> HTML très simple : animation, gestion d'évènements, <a href="http://fr.wikipedia.org/wiki/Ajax_%28informatique%29">Ajax</a>, tout est bien plus simple le tout avec une <a href="http://fr.wikipedia.org/wiki/Interface_de_programmation">API</a> qui fonctionne sur une multitude de navigateur web. Versatile et extensible, JQuery a changé la fonçon de coder de millions de personnes.</p>
				<p>Nous n'avons pas spécifiquement utilisé JQuery lui-même, mais nous en avions besoin pour utiliser des plugins qui nous ont été fort utile : <a href="#">Select2</a> et <a href="#">Tablesorter</a>.</p>
				<p><a class="btn btn-primary btn-lg" role="button" href="http://jquery.com/">En savoir plus &raquo;</a></p>
			</div>
		</div>
		<div id="select2" class="container">
			<div class="well">
				<h2>Select2</h2>
				<p>Il s'agit d'un petit plugin <a href="http://jquery.com/">JQuery</a> permettant de rendre les &ltselect&gt plus puissants, notemment de faire des recherches par quelques lettres puis d'auto-compléter. Cette fcontionnalité s'est révélé très pratique pour notre site car de nombreux champs nécessite un &ltselect&gt et la recherche par complétion s'accorde tout à fait avec l'esprit de recherche d'un film.</p>
				<p><a class="btn btn-primary btn-lg" role="button" href="http://ivaynberg.github.io/select2/">En savoir plus &raquo;</a></p>
				<p>Voici un exemple :</p>
				<p>Ici on définit notre &ltselect&gt avec la class "selectpicker", il faut lui attribuer un id pour la suite.</p>
				<pre><code>
&ltselect id="e1" name="genres" class="selectpicker"&gt
				</code></pre>
				<p>Il faut ensuite placer ce code JavaScript (JQuery) à la fin de la page, il va permettre d'initiliser notre &ltselect&gt en insérant l'identifiant de ce dernier, en lui attribuant le css et les options qui vont bien. En l'occurence nous leur avont attribué un texte indicateur (placeholder), une largeur (width) et la possibilité de supprimer un élément choisi en cliquant sur une petite croix (allowClear)</p>
				<pre><code>
$(document).ready(function() { 
	$("#e1").select2({ placeholder: "genre", allowClear: true, width:'250' });
});
				</code></pre>
			</div>
		</div>
		<div id="tablesorter" class="container">
			<div class="well">
				<h2>Tablesorter</h2>
				<p>Il s'agit d'un plugin <a href="http://jquery.com/">JQuery</a> qui permet de trier un tableau lorsque l'on clique sur ses balises &ltthead&gt, que ce soit dans l'ordre croissant ou décroissant. Nous avons pensé que cet outil irait parfaitement au site puisque lors d'un recherche de film on obtient en général un tableau de plus de 10 résultats. De ce fait pouvoir retrouver exactement ce que l'on veut devient plus facile.</p>
				<p><a class="btn btn-primary btn-lg" role="button" href="http://tablesorter.com/docs/">En savoir plus &raquo;</a></p>
				<p>Voici un exemple :</p>
				<p>Il suffit tout d'abord de définir notre tableau. Tablesorter nécessite d'utiliser les balises "&ltthead&gt" et "&lttbody&gt" du HTML standard, il faut aussi attribuer la classe "tablesorter" au tableau.</p>
				<pre><code>
&lttable class="table-hover table-bordered table-stripped table tablesorter text-center center"&gt
	&ltthead &gt
		&lttr&gt
			&ltth&gtTitre Fançais&lt/th&gt
			&ltth&gtTitre Original&lt/th&gt
			&ltth&gt... etc ...&lt/th&gt
	&lt/thead&gt
	&lttbody&gt
		&lttr&gt
			&lttd&gt... données ...&lt/td&gt
			&lttd&gt... données ...&lt/td&gt
		&lt/tr&gt
		&lttr&gt
			&lttd&gt... données ...&lt/td&gt
			&lttd&gt... données ...&lt/td&gt
		&lt/tr&gt
	&lt/tbody&gt
				</code></pre>
				<p>On ajoute ensuite ce code JavaScript (JQuery) à la fin de la page. Nous n'avons pas mis d'options supplémentaire car le trieur par défaut nous convenait.</p>
				<pre><code>
$("table").tablesorter({
	sortList: [[0,0]]
});
				</code></pre>
			</div>
		</div>
		<div id="allohelper" class="container">
			<div class="well">
				<h2>Allohelper</h2>
				<p>L'API Allociné Helper est un script PHP permettant d'utiliser l'API d'Allociné : on récupère facilement les informations sur les films, les séries TV, les stars, etc ... Il existe une API allociné officiel mais elle n'est pas disponible au public et elle change souvent, c'est pourquoi un généreux codeur s'est mis en tête de mettre a jour régulièrement sa propre API pour faciliter la vie aux cinéphiles. Nous l'avons utilisé pour récupérer des images du site, cependant l'informations en JSon qui nous était retourné était complexe et il fût trop difficile de récuperer correctement toutes les images.</p>
				<p><a class="btn btn-primary btn-lg" role="button" href="https://github.com/etienne-gauvin/api-allocine-helper">En savoir plus &raquo;</a></p>
				<p></p>Voici le code que nous avons utilisé pour récupérer les affiches de cinéma :
				<pre><code>
// Connexion à la base
require_once("connect.php");
require_once("../api-allocine-helper-master/api-allocine-helper.php");

	try{
		$connexion = new PDO(DSN,USER,PASSWD);
	}
	catch(PDOException $e){
		printf("Échec de la connexion : %s\n", $e->getMessage());
		exit();
	}

// On met une limite pour être sûr que toutes les images soit traitées correctement
$sql = "SELECT code_film, titre_francais FROM films ORDER BY code_film LIMIT 0,50";
$stmt = $connexion->prepare($sql);
$stmt -> execute();


// Construire l'objet AlloHelper
$film = new AlloHelper;

while($res=$stmt->fetch(PDO::FETCH_OBJ)) {

	// On peut régler des paramètres
	// Ici, supprimer les tags HTML dans le synopsis.
	$film->set('striptags', 'synopsis');


	// Pour plus de lisibilité, on met les valeurs dans des variables.
	$q = rtrim($res->titre_francais);
	$page = 1;
	$count = 1;
	$filter = array('movie');

	try
	{
		// Envoi de la requête et traitement des données reçues.
		// $url est passée par référence et contiendra l'URL ayant appelé les données.
		$donnees = $film->search( $q, $page, $count, true, $filter, $url );

		// Les données sous forme d'un array
		$URLimage = $donnees['movie'][0]['posterURL'];
		//$current = file_get_contents($URLimage);
		$path = "../images/".$res->code_film.".jpg";
		//file_put_contents($path, $current);
		copy($URLimage,$path);
		echo '&ltimg src='.$URLimage.'&gt';
		fctredimimage(180, 0, '../imagesRedim/', $res->code_film.'.jpg', '../images/', $res->code_film.'.jpg');
	}
	catch ( ErrorException $e)
	{

	}
}
				</code></pre>
			</div>
		</div>

		<?php include_once('footer.php'); ?>

		<script language="javascript" type="text/javascript" src="../jquery/jquery-min.js"></script>
		<script language="javascript" type="text/javascript" src="../dist/js/bootstrap.min.js"></script>
		<script language="javascript" type="text/javascript" src="../select_2/select2.js"></script>
		<script language="javascript" type="text/javascript" src="../jquery/__jquery.tablesorter/jquery.tablesorter.js"></script>
	</body>
</html>