<?php
    require_once('../functions/db.php');

    class Article{
        private $id;
        public $article;
        public $id_utilisateur;
        public $id_categorie;
        public $date;

        public function __construct(){
            $this->db = connect();
        }

// ----------------------------- Anti injection sql --------------------------------------
        // function cleanQuery($article){
        //     if(get_magic_quotes_gpc())   // pas de duplicate backslashes
        //         $article = stripslashes($article);
        //     return mysql_escape_string($article);
        // }

// ----------------------------- Créé article --------------------------------------

        public function create($article, $id_categorie){
            $temps = time();
            $today = date("Y-m-d H:i:s");
            // on attrape la colonne id de la table utilisateur
            $id_utilisateur = $_SESSION['utilisateur']['id'];
            // 
            $sql = "INSERT INTO articles (article, id_utilisateur, id_categorie, date) VALUES (:article, :id_utilisateur, :id_categorie, :date)";
            $result = $this->db->prepare($sql);

            $result->bindValue(":article", $article, PDO::PARAM_STR);
            $result->bindValue(":id_utilisateur", $id_utilisateur, PDO::PARAM_INT);
            $result->bindValue(":id_categorie", $id_categorie, PDO::PARAM_INT);
            $result->bindValue(":date", $today, PDO::PARAM_STR);

            $result->execute();
            
            return $result;
            

        }
    
// ----------------------------- Créé article menu deroulant --------------------------------------
    public function dropDown(){

        $i = 0;
        $drop = $this->db->prepare("SELECT * FROM categories");
        $drop->execute();
        //stockage des noms dans un tableau et dans le select du formulaire 
        // TANT QUE 
        while($fetch = $drop->fetch(PDO::FETCH_ASSOC)){
            // le crochets [] vides correspondent à un tableau vide dans lesquels on va insérer $fetch['id'] & $fetch['nom']
            $tableau[$i][] = $fetch['id'];
            $tableau[$i][] = $fetch['nom'];
            $i++;
            //echo '<option>'.$fetch['nom'] .'</option>';
        }
        return $tableau;
    } 

        public function dropDownDisplay(){
            // nouvel objet article qu'on stock dans la variable $modelArticle
            $modelArticle = new Article();
            // on créée une variabe tableau dans laquelle on va appliquer la méthode dropdown à modelarticle 
            $tableau = $modelArticle->dropDown();
        foreach($tableau as $value){
        echo '<option value="'.$value[0].'">'.$value[1] .'</option>';
        
        }

        }

}

?>