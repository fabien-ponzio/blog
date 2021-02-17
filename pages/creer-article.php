<?php 
session_start();
include('../functions/db.php');
require_once('../class/class-article.php');
require_once('../class/user.php');

 // CHEMINS
 $path_index="../index.php";
 $path_inscription="inscription.php";
 $path_connexion="";
 $path_profil="profil.php";
 $path_articles="articles.php";
 $path_create="creer-article.php";
 $path_admin="admin.php";
 $path_bouclier="bouclier.php";
 $path_bouclierepee="bouclier-eppe.php";
 $path_boucliermasse="bouclier-masse.php";
 $path_double="double.php";
 // HEADER
 require_once('header.php');


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// public function create($article, $id_utilisateur, $id_categorie, $date) 
    if(isset($_POST['create'])){
        $article = new Article();
        $article->create($_POST['titre'],$_POST['article'], $_POST['categorie']);
    }



?>

    <form action="" method="POST">
        <label for="Titre">Titre</label>
        <input type="text" name="titre">

        <label for="article">article</label>
        <textarea name="article" placeholder="Type article here"></textarea>

        <label>categorie</label>
            <select name="categorie">
                <option>Select</option>
                    <?php
                      $article = new Article();
                      $article->dropDownDisplay();

                    ?>

            </select>   
        <input type="submit" name="create" value="go!">

    </form>

</body>
</html>