<!doctype html>
<html>
<?php include_once('head.php'); ?>
	<body>
<?php
// **********************************
// ***************MENU**************
// **********************************
include_once('nav.php');
?>

		<div class="jumbotron">
			<div class="container">
				<h1>Mini Projet PHP !</h1>
				<p>Durant notre formation en Licence professionelle Informatique à l'IUT d'Orléans, il nous a été demandé de réaliser un mini-site en PHP permettant une recherche de film dans une base de donnée.</p>
				<p><a class="btn btn-primary btn-lg" role="button" href="apropos.php">En savoir plus &raquo;</a></p>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h2>Bootstrap</h2>
					<p>Agréable à l'oeil, intuitif et puissant, Bootstrap est un puissant framework CSS permettant un développement web plus rapide et plus facile. C'est l'un des projet les plus populaires de GitHub, créé chez Twitter par <a href="https://twitter.com/mdo">@mdo</a> et <a href="https://twitter.com/fat">@fat</a>.</p>
					<p><a class="btn btn-default" href="technologie.php#boostrap" role="button">Lire la suite &raquo;</a></p>
				</div>
				<div class="col-md-4">
					<h2>Select2</h2>
					<p>Il s'agit d'un petit plugin <a href="http://jquery.com/">JQuery</a> permettant de rendre les &ltselect&gt plus puissants, notemment de faire des recherches par quelques lettres puis d'auto-compléter.
					<p><a class="btn btn-default" href="technologie.php#select2" role="button">Lire la suite &raquo;</a></p>
				</div>
				<div class="col-md-4">
					<h2>JQuery</h2>
					<p>JQuery est une librairie <a href="http://fr.wikipedia.org/wiki/JavaScript">JavaScript</a> rapide, légère et riche en fonctionnalités. Il rend le parcours et la manipulation d'un <a href="http://fr.wikipedia.org/wiki/Document_Object_Model">DOM</a> HTML très simple : animation, gestion d'évènements, <a href="http://fr.wikipedia.org/wiki/Ajax_%28informatique%29">Ajax</a>, tout est bien plus simple le tout avec une <a href="http://fr.wikipedia.org/wiki/Interface_de_programmation">API</a> qui fonctionne sur une multitude de navigateur web.</p>
					<p><a class="btn btn-default" href="technologie.php#jquery" role="button">Lire la suite &raquo;</a></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<h2>PHP</h2>
					<p>PHP est un acronyme recursif pour PHP : Hypertext Preprocessor (le premier "P" de "PHP" veut dire "PHP", tout comme le "E" de "EINE", un dérivé de emacs, veut dire "EINE" pour "EINE Is Not Emacs", on a trouvé ça rigolo). Il s'agit d'un langage très populaire principalement utilisé pour produire à la volée des pages web.</p>
					<p><a class="btn btn-default" href="technologie.php#php" role="button">Lire la suite &raquo;</a></p>
				</div>
				<div class="col-md-4">
					<h2>TableSorter</h2>
					<p>Il s'agit d'un plugin <a href="http://jquery.com/">JQuery</a> qui permet de trier un tableau lorsque l'on clique sur ses balises &ltthead&gt, que ce soit dans l'ordre croissant ou décroissant. Nous avons pensé que cet outil irait parfaitement au site puisque lors d'un recherche de film on obtient en général un tableau de plus de 10 résultats.
					<p><a class="btn btn-default" href="technologie.php#tablesorter" role="button">Lire la suite &raquo;</a></p>
				</div>
				<div class="col-md-4">
					<h2>AlloHelper</h2>
					<p>L'API Allociné Helper est un script PHP permettant d'utiliser l'API d'Allociné : on récupère facilement les informations sur les films, les séries TV, les stars, etc ... Il existe une API allociné officiel mais elle n'est pas disponible au public et elle change souvent, c'est pourquoi un généreux codeur s'est mis en tête de mettre a jour régulièrement sa propre API pour faciliter la vie aux cinéphiles.</p>
					<p><a class="btn btn-default" href="technologie.php#allohelper" role="button">Lire la suite &raquo;</a></p>
				</div>
			</div>
		</div>

		<?php include_once('footer.php'); ?>

		<script language="javascript" type="text/javascript" src="../jquery/jquery-min.js"></script>
		<script language="javascript" type="text/javascript" src="../dist/js/bootstrap.min.js"></script>
		<script language="javascript" type="text/javascript" src="../select_2/select2.js"></script>
		<script language="javascript" type="text/javascript" src="../jquery/__jquery.tablesorter/jquery.tablesorter.js"></script>
	</body>
</html>