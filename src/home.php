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
					<p><a class="btn btn-default" href="#" role="button">Lire la suite &raquo;</a></p>
				</div>
				<div class="col-md-4">
					<h2>Select2</h2>
					<p>Il s'agit d'un petit plugin <a href="http://jquery.com/">JQuery</a> permettant de rendre les &ltselect&gt plus puissants, notemment de faire des recherches par quelques lettres puis d'auto-compléter.
					<p><a class="btn btn-default" href="#" role="button">Lire la suite &raquo;</a></p>
				</div>
				<div class="col-md-4">
					<h2>JQuery</h2>
					<p>JQuery est une librairie <a href="http://fr.wikipedia.org/wiki/JavaScript">JavaScript</a> rapide, légère et riche en fonctionnalités. Il rend le parcours et la manipulation d'un <a href="http://fr.wikipedia.org/wiki/Document_Object_Model">DOM</a> HTML très simple : animation, gestion d'évènements, <a href="http://fr.wikipedia.org/wiki/Ajax_%28informatique%29">Ajax</a>, tout est bien plus simple le tout avec une <a href="http://fr.wikipedia.org/wiki/Interface_de_programmation">API</a> qui fonctionne sur une multitude de navigateur web.</p>
					<p><a class="btn btn-default" href="#" role="button">Lire la suite &raquo;</a></p>
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