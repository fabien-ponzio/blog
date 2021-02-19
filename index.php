<?php 

$database = "functions/db.php"; 
require_once "class/user.php";
//HEADER
$title = "Accueil";

 // CHEMINS
 $path_index="";
 $path_inscription="pages/inscription.php";
 $path_connexion="pages/connexion.php";
 $path_profil="pages/profil.php";
 $path_articles="pages/articles.php";
 $path_create="pages/creer-article.php";
 $path_admin="pages/admin.php";
 $path_bouclier="pages/bouclier.php";
 $path_bouclierepee="pages/bouclier-eppe.php";
 $path_boucliermasse="pages/bouclier-masse.php";
 $path_double="pages/double.php";
 // HEADER
 require_once('pages/header.php');
var_dump($_SESSION); 

?>