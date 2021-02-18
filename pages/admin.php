<?php
session_start();

// $database = ("../functions/db.php");
require_once('../class/user.php');
require_once('../class/classAdmin.php');
require_once('../class/class-droits.php');
require_once('../class/class-categories.php');
require_once('../class/class-article.php');

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
 if (!isset($_SESSION['id_droits']) OR $_SESSION['id_droits'] != 1337) {
    echo"Cette page est accessible qu'aux administrateurs";
 }
 else {


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
        $update = new Admin();
        $update->UpdateNewUser($_POST['moddingUser'], $_POST['UpdateLog'], $_POST['UpdateMail'], $_POST['updatePW'], $_POST['updateCPW']);
    }
    if (isset($_POST['createUser'])) {
        $NewUser = new Admin();
        $NewUser->registerNewUser($_POST['createLogin'], $_POST['eMail'], $_POST['createPW'], $_POST['confirmPW'], $_POST['droitNewUser']);
    }

    if (isset($_POST['deleteArticle'])){
        $deleteArticles = new Admin;
        $deleteArticles->deleteArticle($_POST['titreArticles']);
    }
    if (isset($_POST['deleteUser'])) {
        $delete = new Admin();
        $delete->deleteUser($_POST['moddingUser']); 
    }
    if (isset($_POST['CreateCategorie'])) { 
        $addCat = new Categorie;
        $addCat->addCategories($_POST['createCat']);
    }
    if (isset($_POST['UpdateCategorie'])){
        $updateCat = new Categorie;
        $updateCat->updateCategorie($_POST["updateCateg"]);
    }
    if (isset($_POST['deleteCat'])){
        $deleteCat = new Categorie;
        $deleteCat->deleteCategorie($_POST["delCategorie"]);
    }
    if (isset($_POST['updateArticle'])){
        $updateArticle = new Admin;
        $updateArticle->updateArticle($_POST['titreArticles'],$_POST['titre'], $_POST['txtarticle'], $_POST['updateCat']);
    }
    

    ?>
    <h1>Modification de User</h1>
    <form action="" method="POST">
        <label>Update User</label>

        <select name="moddingUser">
            <option>Select</option>

            <?php
            $article = new User();
            $article->getDisplay();
            ?>
        </select>

            <label for="UpdateLog">Changez le nv pseudo</label>
            <input type="text" name="UpdateLog">

            <label for="UpdateMail">E-Mail:</label>
            <input type="eMail" name="UpdateMail">

            <label for="updatePW">Nouveau mot de passe:</label>
            <input type="password" name="updatePW">

            <label for="updateCPW">Confirmez le mot de passe: </label>
            <input type="password" name="updateCPW">

            <label>Select Droits</label>
        <select name="droitUser">
            <option>Select</option>
            <?php
            $droits = new Droits();
            $droits->displayChoice();
            ?>
        </select>
        <input type="submit" name="mod" value="go!">
        <input type="submit" name="deleteUser" value="supprimew">
    </form>

    <h1>Creation d'Utilisateur</h1>
    <form action="" method=POST>

        <label for="createLogin">Nouveau Login:</label>
        <input type="text" name="createLogin">
        <label for="eMail">E-Mail:</label>
        <input type="email" name="eMail">
        <label for="createPW">Nouveau mot de passe:</label>
        <input type="password" name="createPW">
        <label for="ConfirmPW">Confirmez le mot de passe: </label>
        <input type="password" name="confirmPW">

        <label>Select Droits</label>
        <select name="droitNewUser">
            <option>Select</option>
            <?php
            $droits = new Droits();
            $droits->displayChoice();
            ?>
        </select>
        <input type="submit" name="createUser">

    </form>

    <h1>Modification Article</h1>
    <form action="" method="POST">
        <label for="">Select Articles</label>
        <select name="titreArticles">
            <option>Select</option>
            <?php
                $articles = new Admin();
                $articles->getDisplay();
            ?>
        </select>

        <label for="">New Titres</label>
        <input type="text" name="titre">

        <label for="">New Texte</label>
        <textarea name="txtarticle" cols="80" rows="10"></textarea>

        <label for="">Select categorie</label>
        <select name="updateCat">
                <option>Select</option>
                    <?php
                      $deleteCat = new Article();
                      $deleteCat->dropDownDisplay();
                    ?>
            </select>
        <input type="submit" name="updateArticle" value="Update"></input>
        <input type="submit" value="Delete" name="deleteArticle">
    </form>



    <h1>CATEGORIE</h1>

    <form action="" method="POST">
        <label for="createCat">Nouvelle Categorie</label>
        <input type="text" name="createCat">
        <input type="submit" name='CreateCategorie'>
    </form>

    <form action="" method="POST">
        <label for="updateCat">Update categorie name</label>
        <select name="updateCat">
                <option>Select</option>
                    <?php
                      $deleteCat = new Article();
                      $deleteCat->dropDownDisplay();
                    ?>
            </select>
        <input type="text" name="updateCateg">
        <input type="submit" name='UpdateCategorie'>
    </form>

    <form  action="" method="POST">
        <label for='delCategories'>Suprimer categorie</label>
            <select name="delCategorie">
                <option>Select</option>
                    <?php
                      $deleteCat = new Article();
                      $deleteCat->dropDownDisplay();
                    ?>
            </select>
        <input type="submit" name="deleteCat">
    </form>
</body>
</html>
<?php } ?>  
