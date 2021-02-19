<?php
session_start();

// $database = ("../functions/db.php");
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
 $path_bouclier="bouclier.php";
 $path_bouclierepee="bouclier-eppe.php";
 $path_boucliermasse="bouclier-masse.php";
 $path_double="double.php";
 // HEADER
 require_once('header.php');
?>
<h1>Article 1</h1>
<?php
var_dump($_SESSION);
echo"com1";
echo"com2"; 
$login = $_SESSION['utilisateur'];
if(isset($_POST["postComment"])){
    $commentaire = new Commentaires();
    $commentaire->postComment($login, $_POST['comment']);
}
?>
<form action="" method=POST>
<label for="">Ajouter un commentaire</label>
<textarea name="comment" id="" cols="30" rows="10"></textarea>
<input type="submit" name="postComment" value="commenter">
</form>
