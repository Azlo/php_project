<?php
// **********************************
// ***FONCTION CONSTRUCTION REQUETE**
// **********************************
//  (Mini moteur de recherche php)
	function queryBuild() {
		$select = "SELECT code_film, titre_original, titre_francais, pays, date, duree, couleur, realisateur, image, Irealisateur.nom AS nomRealisateur, Irealisateur.prenom AS prenomRealisateur";

		$from = " FROM films f, individus Irealisateur";
		$where = " WHERE f.realisateur=Irealisateur.code_indiv";
		$str = "";

		if (!empty($_POST["genres"])) {
			
			$genres = $_POST["genres"];

			if ($genres != "") {
				$where .= " AND code_genre='" . $genres . "'";
			}

			$from .= ", genres g, classification c";
			$where .= " AND f.code_film = c.ref_code_film AND c.ref_code_genre = g.code_genre";

		}


		if (!empty($_POST["pays"])) {
			
			$pays = $_POST["pays"];
			$where .= " AND pays='" . $pays . "'";
		}


		if (!empty($_POST["acteurs"])) {

			$acteurs = $_POST["acteurs"];
			$where .= " AND Iacteurs.code_indiv='" . $acteurs . "'";

			$str = "acteurs";
			if(preg_match('#'.$str.'#', $from)){

			}
			else {
				$from .= ', acteurs a, individus Iacteurs';
				$where .= ' AND a.ref_code_film = f.code_film AND a.ref_code_acteur = Iacteurs.code_indiv';
			}
			$select .= ', Iacteurs.nom AS nomActeurs, Iacteurs.prenom AS prenomActeurs';
		}


		if (!empty($_POST["realisateur"])) {
			$realisateur = $_POST["realisateur"];
			$where .= " AND realisateur='" . $realisateur . "'";

			$str = "individus";
			if(preg_match('#'.$str.'#', $from)){

			}
			else {
				$from .= ',individus i';
				$where .= 'AND f.realisateur = i.code_indiv';
			}
		}


		if (!empty($_POST["date"])) {
			$date = $_POST["date"];
			$where .= " AND date='" . $date . "'";
		}


		if (!empty($_POST["couleur"])) {
			$couleur = $_POST["couleur"];
			$where .= " AND couleur='" . $couleur . "'";
		}

		echo "<br/>";echo "GENRES : ";
		var_dump($_POST["genres"]);
		echo "<br/>";
		echo "LE FROOOOOOM : ";
		var_dump($from);echo "<br/>";
		echo "LE WHEEEEERE : ";
		var_dump($where);echo "<br/>";

	$query = $select . $from . $where;

	echo "LE TOTAAAAAAL : ";
	var_dump($query);
	return $query;
	}
?>