<?php 
$database = ("../functions/db.php"); 
require_once('../class/article.php');
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
        $sql = "SELECT nom FROM categories"
        $query = mysql_query($sql);
        while($results[] = mysql_fetch_object($query));
        array_pop($results);
    ?>
        <label for="article">article</label>
        <input type="textarea" name="article">

        <label for="categorie">categorie</label>
        <input type="select" name="categorie">
            <?php foreach($results as $option) :/*affichage des catgorie depuis la db */  ?> 
                <option value="<?php echo $option->desired_value; ?>"><?php echo $option->desired_label; ?></option>
            <?php endforeach; ?>
        <input type="submit" name="create" value="go!">

    </form>

</body>
</html>