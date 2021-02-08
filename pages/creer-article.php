<?php 
include('../functions/db.php');
require_once('../class/article.php');
$database = ("../functions/db.php"); 
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

// public function create($article, $id_utilisateur, $id_categorie, $date)& 

    

?>

    <form action="" method="POST">

    <?php
        //querry pour selectionner les categorie dans la db 
        

    ?>
        <label for="article">article</label>
        <input type="textarea" name="article">

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