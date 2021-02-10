<?php
session_start();
$database = ("../functions/db.php"); 
// require_once('../functions/db.php');
require('../class/user.php');



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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

// public function register($login, $password, $confirmPW)

if (isset($_POST["connect"])){
                $user = new User();
                $user->ConnectUser($_POST['login'], $_POST['password']);
                }
                var_dump($_POST);
?>

<form action="" method="POST">

    <label for="login">login</label>
    <input type="text" name="login">
    <label for="password" name="password">mdp</label>
    <input type="password" name="password">
    <input type="submit" name="connect" value="go!">

</form>
</body>
</html>