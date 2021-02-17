<?php
    require_once('../functions/db.php');

    class Categorie{
        private $id;
        public $nom;

        public function __construct(){
            $this->db = connect();
        }

// ----------------------------- Add new categories-------------------------------------
        public function addCategories($nom){
            $addCat = $this->db->prepare("INSERT INTO categories(nom) VALUES(:nom)");
            $addCat->bindValue(":nom", $nom, PDO::PARAM_STR);

            $addCat->execute();
        }
// ----------------------------- Delete categories-------------------------------------
        public function deleteCategorie($nom){
            $deleteCat = $this->db->prepare("DELETE FROM categories WHERE id = :nom");
            $deleteCat->bindValue(":nom", $nom, PDO::PARAM_INT);

            $deleteCat->execute();
        }
// ----------------------------- Update categories------------------------------------- 
        public function updateCategorie($nom){
            $updateCat = $this->db->prepare("UPDATE categories SET nom = :nom WHERE id = :nom");
            $updateCat->bindValue(":nom", $nom, PDO::PARAM_STR);

            $updateCat->execute();
        }
    }