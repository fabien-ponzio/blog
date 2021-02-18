<?php 
require_once('../functions/db.php');

class Commentaires
{
    private $id;
    public $commentaire;
    private $id_article;
    private $id_utilisateur;
    public $date;

    public function __construct()
    {
        $this->db = connect();
    }


// ----------------------------- Ajout commentaire -------------------------------------
    public function postComment($login, $commentaire){
        $errorCom = null;
        $securedComment = htmlspecialchars(trim($commentaire)); 

        if(!empty($commentaire)){
            $comLength = strlen($commentaire);

            if (($comLength < 240)){
                $insertCom = $this->db->prepare("INSERT INTO commentaires (login, commentaire) VALUES (:login, :commentaire)");
                $insertCom = bindValues
            }
            else{
                $errorCom = "La taille de commentaire maximum est de 240 caractères";
            }
        
        }
        echo $errorCom;
    }



}