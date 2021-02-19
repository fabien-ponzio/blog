<?php 

$database = ("../functions/db.php"); 
require_once("../class/user.php");
require_once("../class/class-article.php");
require_once("../class/class-categories.php");

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
$NewArticle = new Article;
// $NewArticle->displayArticle();
$NewArticle->articlepage();
if (isset($_POST['trierCategorie'])){
    $trie = new Article;
    $trie->articleByCategory($_POST['updateCat']);
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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste Articles</title>
</head>
<body>
    <main>

        <form action="" method="POST">

            <label for="">Choisie une categorie</label>
            <select name="updateCat">
                <option>Select</option>
                    <?php
                      $deleteCat = new Article();
                      $deleteCat->dropDownDisplay();
                    ?>
            </select>

            <input type="submit" value="Trier" name="trierCategorie">

        </form>
    </main>
</body>
</html>
