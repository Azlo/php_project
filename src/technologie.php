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
		<div class="container">
			<div class="well">
				<h2>Bootstrap</h2>
				<p>Agréable à l'oeil, intuitif et puissant, Bootstrap est un puissant framework CSS permettant un développement web plus rapide et plus facile. C'est l'un des projet les plus populaires de GitHub, créé chez Twitter par <a href="https://twitter.com/mdo">@mdo</a> et <a href="https://twitter.com/fat">@fat</a>.</p>
				<p>Nous l'avons choisi pour sa facilité d'utilisation et son ergonomie (parce qu'on trouvait ça joli en fait).</p>
				<p><a class="btn btn-primary btn-lg" role="button" href="http://www.oneskyapp.com/docs/bootstrap/fr">Pour plus d'infos &raquo;</a></p>			
				
				
				
				
				
				<p><a class="btn btn-primary btn-lg" role="button" href="apropos.php">En savoir plus &raquo;</a></p>
				<p><a class="btn btn-primary btn-lg" role="button" href="apropos.php">En savoir plus &raquo;</a></p>
				<p><a class="btn btn-primary btn-lg" role="button" href="apropos.php">En savoir plus &raquo;</a></p>
				<p><a class="btn btn-primary btn-lg" role="button" href="apropos.php">En savoir plus &raquo;</a></p>
				<p><a class="btn btn-primary btn-lg" role="button" href="apropos.php">En savoir plus &raquo;</a></p>
				<p><a class="btn btn-primary btn-lg" role="button" href="apropos.php">En savoir plus &raquo;</a></p>
				<a href="OLOLOLOL">LALALLAA</a>
				<a href="OLOLOLOL">LALALLAA</a>
				<a href="OLOLOLOL">LALALLAA</a>
				<a href="OLOLOLOL">LALALLAA</a>
				<a href="OLOLOLOL">LALALLAA</a>
				<a href="OLOLOLOL">LALALLAA</a>
				
			</div>
		</div>
		<div class="container">
			<div class="well">
				<h2>JQuery</h2>
				<p>JQuery est une librairie <a href="http://fr.wikipedia.org/wiki/JavaScript">JavaScript</a> rapide, légère et riche en fonctionnalités. Il rend le parcours et la manipulation d'un <a href="http://fr.wikipedia.org/wiki/Document_Object_Model">DOM</a> HTML très simple : animation, gestion d'évènements, <a href="http://fr.wikipedia.org/wiki/Ajax_%28informatique%29">Ajax</a>, tout est bien plus simple le tout avec une <a href="http://fr.wikipedia.org/wiki/Interface_de_programmation">API</a> qui fonctionne sur une multitude de navigateur web. Versatile et extensible, JQuery a changé la fonçon de coder de millions de personnes.</p>
				<p>Nous n'avons pas spécifiquement utilisé JQuery lui-même, mais nous en avions besoin pour utiliser des plugins qui nous ont été fort utile : <a href="#">Select2</a> et <a href="#">Tablesorter</a>.</p>
				<p><a class="btn btn-primary btn-lg" role="button" href="http://jquery.com/">En savoir plus &raquo;</a></p>
			</div>
		</div>
		<div class="container">
			<div class="well">
				<h2>Select2</h2>
				<p>Il s'agit d'un petit plugin <a href="http://jquery.com/">JQuery</a> permettant de rendre les &ltselect&gt plus puissants, notemment de faire des recherches par quelques lettres puis d'auto-compléter. Cette fcontionnalité s'est révélé très pratique pour notre site car de nombreux champs nécessite un &ltselect&gt et la recherche par complétion s'accorde tout à fait avec l'esprit de recherche d'un film.</p>
				<p><a class="btn btn-primary btn-lg" role="button" href="http://ivaynberg.github.io/select2/">En savoir plus &raquo;</a></p>
			</div>
		</div>
		<div class="container">
			<div class="well">
				<h2>Tablesorter</h2>
				<p>Il s'agit d'un plugin <a href="http://jquery.com/">JQuery</a> qui permet de trier un tableau lorsque l'on clique sur ses balises &ltthead&gt, que ce soit dans l'ordre croissant ou décroissant. Nous avons pensé que cet outil irait parfaitement au site puisque lors d'un recherche de film on obtient en général un tableau de plus de 10 résultats. De ce fait pouvoir retrouver exactement ce que l'on veut devient plus facile.</p>
				<p><a class="btn btn-primary btn-lg" role="button" href="http://tablesorter.com/docs/">En savoir plus &raquo;</a></p>
			</div>
		</div>
		<div class="container">
			<div class="well">
				<h2>Allohelper</h2>
				<p>L'API Allociné Helper est un script PHP permettant d'utiliser l'API d'Allociné : on récupère facilement les informations sur les films, les séries TV, les stars, etc ... Nous l'avons utilisé pour récupérer des images du site, cependant l'informations en JSon qui nous était retourné était complexe et il fût trop difficile de récuperer correctement toutes les images.</p>
				<p><a class="btn btn-primary btn-lg" role="button" href="https://github.com/etienne-gauvin/api-allocine-helper">En savoir plus &raquo;</a></p>
			</div>
		</div>

		<?php include_once('footer.php'); ?>

		<script language="javascript" type="text/javascript" src="../jquery/jquery-min.js"></script>
		<script language="javascript" type="text/javascript" src="../dist/js/bootstrap.min.js"></script>
		<script language="javascript" type="text/javascript" src="../select_2/select2.js"></script>
		<script language="javascript" type="text/javascript" src="../jquery/__jquery.tablesorter/jquery.tablesorter.js"></script>
	</body>
</html>