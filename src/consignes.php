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
				<h1>Les consignes du projet !</h1>
				<p>Pour le projet, des consignes précise nous ont été données, </p>
				<p><a class="btn btn-primary btn-lg" role="button" href="../pdf/MiniProjetPHP.pdf">Voir le pdf</a></p>
			</div>
		</div>
		<div class="container">
			<div class="well">
				<h2>Objectifs :</h2>
				<ul>
					<li>Prenez le script "Films.sql" ci-joint et insérez le dans votre base mysql.</li>
					<li>Assurez-vous que vous avez bien compris les tables qui y figurent ainsi que leurs liaisons.</li>
					<li>Réalisez une page de consultation multi-critères (par année, genre, etc.) de cette base</li>
					<li>Réalisez un export XML de tous les films d’un certain genre avec au moins le titre du film, son réalisateur et l’année de réalisation.</li>
					<li>Options possibles : Gérer les affiches de films, Définir la DTD correspondante et réaliser une importation XML d’une liste de films d’un genre donné. Vérifiez la validité du document XML et la conformité du document à cette DTD.</li>
				</ul>
				<h2>Organisation :</h2>
				<ul>
					<li>Mettez-vous par groupes de 2, voire 3 si les options sont traitées.</li>
					<li>Rendez le projet dans une archive ".tgz" au nom des membres du groupe.</li>
					<li>Incluez-y tous les fichiers nécéssaires pour installer votre site ainsi qu’un fichier "install.txt" donnant les explications nécéssaires.</li>
					<li>Ajoutez un fichier de documentation décrivant le plan du site ainsi qu’une description des pages réalisées et des fonctionnalités du site.</li><li></li>
					<li>Commentez votre code.</li>
					<li>Date de rendu : Jeudi 9 Janvier à 14h30. Soutenances à la suite à voir avec votre chargé de TD Web (Geoffrey Cochard ou Gérard Rozsavolgyi ou Roland Garnier).</li>
				</ul>
			</div>
		</div>

		<?php include_once('footer.php'); ?>

		<script language="javascript" type="text/javascript" src="../jquery/jquery-min.js"></script>
		<script language="javascript" type="text/javascript" src="../dist/js/bootstrap.min.js"></script>
		<script language="javascript" type="text/javascript" src="../select_2/select2.js"></script>
		<script language="javascript" type="text/javascript" src="../jquery/__jquery.tablesorter/jquery.tablesorter.js"></script>
	</body>
</html>