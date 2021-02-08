<?php
    require_once('../functions/db.php');

    class article{
        private $id;
        public $article;
        public $id_utilisateur
        public $id_categorie
        public $date

        public function __construct(){
            $this->db = connect();
        }

// ----------------------------- Anti injection sql --------------------------------------
        function cleanQuerre($article){
            if(get_magic_quotes_gpc())   // pas de duplicate backslashes
                $article = stripslashes($article);
            return mysql_escape_string($article);
        }

// ----------------------------- Créé article --------------------------------------

        public function create($article, $id_utilisateur, $id_categorie, $date){


        }
    }


?>