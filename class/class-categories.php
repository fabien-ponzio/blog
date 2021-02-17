<?php
    require_once('../functions/db.php');

    class Categorie{
        private $id;
        public $nom;

        public function __construct(){
            $this->db = connect();
        }