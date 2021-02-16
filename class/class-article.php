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
            $id_utilisateur = $_SESSION['utilisateur']['id'];
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
        }
        return $tableau;
    } 

//         public function dropDownDisplay(){
//             // nouvel objet article qu'on stock dans la variable $modelArticle
//             $modelArticle = new Article();
//             // on créée une variabe tableau dans laquelle on va appliquer la méthode dropdown à modelarticle 
//             $tableau = $modelArticle->dropDown();
//         foreach($tableau as $value){
//         echo '<option value="'.$value[0].'">'.$value[1] .'</option>';
//         }
//         }
// // ----------------------------- Afficher les articles --------------------------------------
//         public function displayArticle(){
//             echo "<table>";
//             $article=$this->db->prepare(
//                 "SELECT u.login, a.article, a.id_utilisateur, a.id_categorie, a.date, c.nom
//                 FROM articles a INNER JOIN utilisateurs u ON a.id_utilisateur=u.id
//                 INNER JOIN categories c ON a.id_categorie = c.id  ORDER BY a.date DESC LIMIT 5");
//             $article->execute();
//             $result = $article->fetchAll(PDO::FETCH_ASSOC);
//             var_dump($result);
//             for ($i = 0; $i < count($result); $i++) {
//                 echo "<tr>
//                             <td>" . $result[$i]['login'] . "</td>
//                             <td>" . $result[$i]['article'] . "</td>
//                             <td>" . $result[$i]['id_utilisateur'] . "</td>
//                             <td>" . $result[$i]['nom'] . "</td>
//                             <td>" . $result[$i]['date'] . "</td>
//                 </tr>";
//             }
//         echo "</table>";
//         }

        public function articlepage(){
            $total = $this->db->query("SELECT COUNT(*) FROM articles")->fetchColumn();

            //How Many items to list per pages
            $limit = 5;

            //How many page will there be
            $pages = ceil($total / $limit); //ceil function qui arondi au nombre supérieurs

            //What page are we currently on ?
            $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
                'option' => array(
                    'default' => 1,
                    'min_range' => 1,
                ),
            )));

            //Calcultae the offset for the query
            $offset = ($page) * $limit;

            $start = $offset + 1; // Pour afficher des varirables pas nécessaire
            $end = min(($offset + $limit), $total); // Pour afficher des varirables pas nécessaire

        //The back link
            $prevlink = ($page > 1) ? '<a href="?page=' . ($page - 1) . '" title="Next page">&laquo;</a> <a href="?page=' . ($pages - 1) . '" title="Last page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';
            // The "forward" link
            $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

        // Display the paging information
            echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';

            //Prepare the page of query
            $article=$this->db->prepare(
                    "SELECT u.login, a.article, a.id_utilisateur, a.id_categorie, a.date, c.nom
                    FROM articles a INNER JOIN utilisateurs u ON a.id_utilisateur=u.id
                    INNER JOIN categories c ON a.id_categorie = c.id  ORDER BY a.date DESC LIMIT :limit OFFSET :offset");
            $article->bindParam(':limit', $limit, PDO::PARAM_INT);
            $article->bindParam(':offset', $offset, PDO::PARAM_INT);
            $article->execute();

            //Do we have any result?
            if ($article->rowCount() > 0){
                //Define how we want to fetch the results
                $article->setFetchMode(PDO::FETCH_ASSOC);
                $iterator = new IteratorIterator($article);

                //Display the results
                foreach($iterator as $row){
                    echo '<p>', $row['nom'], '</p>';
                }
            }else{
                echo '<p> No result could be displayed</p>';
            }
        }
    }

?>