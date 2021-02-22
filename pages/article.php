<?php

$database = ("../functions/db.php");
require_once("../functions/db.php");
require_once('../class/user.php');
require_once('../class/classAdmin.php');
require_once('../class/class-droits.php');
require_once('../class/class-categories.php');
require_once('../class/class-article.php');
require_once('../class/classCommentaire.php');
require_once('../class/classCommentaire.php');

 // CHEMINS
 $path_index="../index.php";
 $path_inscription="inscription.php";
 $path_connexion="";
 $path_profil="profil.php";
 $path_articles="articles.php";
 $path_create="creer-article.php";
 $path_admin="admin.php";
 $path_deconnexion="deconnexion.php";
 // HEADER
 
 if (isset($_GET['id'])){
     $article = new Article;
     $article->ArticleById($_GET['id']);
     var_dump($_GET['id']);
 }
 
$login = $_SESSION['utilisateur'];
if(isset($_POST["postComment"])){
    $commentaire = new Commentaires;
    $commentaire->postComment($login, $_POST['comment']);
}
$comment= new Commentaires; 
$comment->displayComment($_GET['id']); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/header.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artcile</title>
</head>
<body>
    
<?php require_once('header.php');?>

<form action="" method=POST>
<label for="">Ajouter un commentaire</label>
<textarea name="comment" id="" cols="30" rows="10"></textarea>
<input type="submit" name="postComment" value="commenter">
</form>
</body>
</html>
