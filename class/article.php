<?php
    session_start(),
    require_once('../functions/db.php');

    class article{
        private $id;
        public $article;
        public $id_utilisateur;
        public $id_categorie;
        public $date;

        public function __construct(){
            $this->db = connect();
        }
// ----------------------------- Créé article --------------------------------------

        
    }


?>