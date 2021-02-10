<?php
$database = ("../functions/db.php"); 
require_once('../class/user.php');
$user=new user();

session_start(); 

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil</title>
</head>
<body>
<main>
<form action="profil.php" method="POST">

    <label for="newLogin">Nouveau pseudo</label>
    <input class="form_input" type="text"  name="newlogin" placeholder="Login"> <br>
    <label for="newmail">Nouvelle adresse mail</label>
    <input type="email" name="newMail">
    <label for="oldPassword">New password</label>
    <input class="form_input" type="password" name="newpassword" placeholder="New password"><br>
    <label for="newPassword">Confirm password</label>
    <input class="form_input" type="password" name="confpassword" placeholder="Confirm Password"><br>
    <input id="profile_input" type="submit" name="submit" value="Envoyer" class='boutton'><br>

<?php 
// var_dump($_SESSION['utilisateur']); 
// var_dump($_POST);

if (isset($_POST['submit'])){
    $user->profile($_POST['newlogin'],$_POST['newMail'],$_POST['newpassword'],$_POST['confpassword']);

}
?> 
</form>
</main>
</body>
</html>