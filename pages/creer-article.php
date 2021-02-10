<?php 
session_start(),
include('../functions/db.php');
require_once('../class/article.php');
$database = ("../functions/db.php"); 
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
        $article->create($_POST['article'], $_POST['categorie']);
    }


    

?>

    <form action="" method="POST">

        <label for="article">article</label>
        <textarea name="article" placeholder="Type article here"></textarea>

        <label>categorie</label>
            <select name="categorie">
                <option>Select</option>
                    <?php
                        $db = mysqli_connect("localhost", "root", "", "blog");//co a la db pour la query
                        if(!$db){
                            echo "failed to connect" . mysqli_connect_error();
                        }
                        $sql = "SELECT * FROM categories";
                        $result = mysqli_query($db, $sql);
                        //stockage des noms dans un tableau et et dans le select du formulaire 
                        while($row = mysqli_fetch_array($result)){
                            echo '<option>'.$row['nom'] .'</option>';
                        }
                    ?>

            </select>   
        <input type="submit" name="create" value="go!">

    </form>

</body>
</html>