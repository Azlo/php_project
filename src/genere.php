<!doctype html>
<html>
	<head>
		<title>Liste de films</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap-responsive.min.css"/>
		<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../select_2/select2.css" />
	</head>

	<body>

<?php










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

	$sql = "SELECT code_film, titre_francais FROM films ORDER BY code_film LIMIT 600,100";
	$stmt = $connexion->prepare($sql);
	$stmt -> execute();



	while($res=$stmt->fetch(PDO::FETCH_OBJ)) {


		fctredimimage(120, 0, '../imagesRedim/', $res->code_film.'.jpg', '../images/', $res->code_film.'.jpg');

	}

/*
$image = "http://uploads.siteduzero.com/files/192001_193000/192501.png";
// Ouvre un fichier pour lire un contenu existant
$current = file_get_contents($image);
// Écrit le résultat dans le fichier
$file = "dossier/mini.png";
file_put_contents($file, $current);
*/



?>
		<script language="javascript" type="text/javascript" src="../jquery/jquery-min.js"></script>
		<script language="javascript" type="text/javascript" src="../dist/js/bootstrap.min.js"></script>
		<script language="javascript" type="text/javascript" src="../select_2/select2.js"></script>
		<script language="javascript" type="text/javascript" src="../jquery/__jquery.tablesorter/jquery.tablesorter.js"></script>
	</body>
</html>