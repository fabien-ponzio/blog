<?php 
//co db
$database = ("functions/db.php");
require_once("functions/db.php"); 
require_once("class/user.php");
require_once("class/class-article.php");

 // CHEMINS
 $path_index="";
 $path_inscription="pages/inscription.php";
 $path_connexion="pages/connexion.php";
 $path_profil="pages/profil.php";
 $path_articles="pages/articles.php";
 $path_create="pages/creer-article.php";
 $path_admin="pages/admin.php";
 $path_deconnexion="deconnexion.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once('pages/header.php');
    
        $NewArticle = new Article;
    // $NewArticle->displayArticle();
    $NewArticle->articlepageIndex();
    if (isset($_POST['trierCategorie'])){
        $trie = new Article;
        $trie->articleByCategoryIndex($_POST['updateCat']);
        echo "<table>";
        foreach($_SESSION['categorie'] as $row){
            echo 
            "<tr>
                <td>" . $row['Titre'] . "</td>
                <td>" . $row['article'] . "</td>
                <td>" . $row['nom'] ."</td>
                <td>" . $row['date'] ."</td>
            </tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>