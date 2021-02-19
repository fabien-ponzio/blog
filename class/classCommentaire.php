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
                $insertCom = $this->db->prepare("INSERT INTO commentaires (id_utilisateur, commentaire, id_article, date) VALUES (:login, :commentaire, :article, :NOW)");
                $insertCom->bindValue(":login", $login, PDO::PARAM_STR);
                $insertCom->bindValue(":commentaire", )
                $insertCom->bindValue
            }
            else{
                $errorCom = "La taille de commentaire maximum est de 240 caractères";
            }
        
        }
        echo $errorCom;
    }



}