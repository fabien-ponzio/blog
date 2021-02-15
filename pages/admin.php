<?php 
session_start();
// $database = ("../functions/db.php");
require_once('../class/user.php');
require_once('../class/classAdmin.php');
require_once('../class/class-droits.php');

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <?php
    if(isset($_POST['mod'])){
        $droits = new User();
        $droits->updateDroit($_POST['moddingUser'], $_POST['droitUser']);
    }
    ?>
    <form action="" method="POST">
        <label>Select User</label>

            <select name="moddingUser">
                <option>Select</option>

                    <?php
                    $article = new User();
                    $article->getDisplay();
                    ?>
            </select>
            <label>Select Droits</label>
            <select name="droitUser">
                <option>Select</option>
                    <?php
                        $droits = new Droits();
                        $droits->displayChoice();
                    ?>
            </select>
        <input type="submit" name="mod" value="go!">
    </form>
</body>
</html>
