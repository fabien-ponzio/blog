<?php 
require_once('../functions/db.php');

class Admin{
    public $login; 
    public $password; 
    public $id_droits; 

    public function __construct()
    {
        $this->db = connect();
    }

    public function updateRights($login, $id_droits){
    
        $query = $this->db->prepare ("UPDATE utilisateurs SET id_droits=:id WHERE id=:login"); 
    
        $query->bindValue(":id", $id_droits, PDO::PARAM_INT); 
        $query->bindValue(":login", $login, PDO::PARAM_STR); 
    
        $query->execute();
        var_dump($query);    
    }

    public function registerNewUser ($login, $email, $password, $confirmPW, $id_droits){
        // $database = connect();
    
         $error_log = null; 
    
         $login =  htmlspecialchars(trim($login));
         $email = htmlspecialchars(trim($email));
         $password =  htmlspecialchars(trim($password));
         $confirmPW =  htmlspecialchars(trim($confirmPW));  
        // var_dump($_POST);

        if (!empty($login) && !empty($password) && !empty($confirmPW) && !empty($email) &&!empty($id_droits)) {
            echo"hardjojo";
        $logLength = strlen($login); 
        $passLength = strlen($password); 
        $confirmLength = strlen($confirmPW); 
        $mailLength = strlen($email);
    
            if (($logLength >= 5) && ($passLength >= 5) && ($confirmLength >= 5) && ($mailLength >=5)) {
                echo"jardhoho";
               $checkLength = $this->db->prepare("SELECT login FROM utilisateurs WHERE login=:login");
               $checkLength->bindValue(":login", $login, PDO::PARAM_STR);
               $checkLength->execute();
               $count = $checkLength->fetch(); 
               var_dump($count); 
    
                if (!$count) {
                    echo"hardhoho";
                    var_dump($password, $confirmPW); 
                    if ( $password == $confirmPW) {
    
                        echo"hardhojo"; 
    
                       $cryptedpass = password_hash($password, PASSWORD_BCRYPT); // CRYPTED 
                    //    $this->login = $login ; 
                       $insert = $this->db->prepare("INSERT INTO utilisateurs (login, password, email, id_droits ) VALUES (:login, :cryptedpass ,:email, :id_droits)"); 
                       $insert->bindValue(":login", $login, PDO::PARAM_STR);
                       $insert->bindValue(":cryptedpass", $cryptedpass, PDO::PARAM_STR);
                       $insert->bindValue(":email", $email, PDO::PARAM_STR); 
                       $insert->bindValue(":id_droits", $id_droits, PDO::PARAM_INT); 
                    //    $insert->bindValue(); 
                       $insert->execute(); 
                       echo"Nouvel utilisateur créée"; 
                    }
                    else {
                        $error_log = "confirmation du mot de passe incorrect"; 
                    }
                }
                else {
                    $error_log = "l'identifiant existe déjà"; 
                }
         }
        else {
            $error_log = "5 caractères minimum doivent être insérés dans chaques champs" ; 
        }
    }
    else {
        $error_log = "Champs non remplis"; 
    }
    echo $error_log; 
}
    public function UpdateNewUser($login, $email, $password, $confirmPW){

    $login =  htmlspecialchars(trim($login));
    $email = htmlspecialchars(trim($email));
    $password =  htmlspecialchars(trim($password));
    $confirmPW =  htmlspecialchars(trim($confirmPW));  

    if (!empty($login) && !empty($email) && !empty($password) && !empty($confirmPW)){ echo 'cc2';
       $logLength = strlen($login); 
       $passLength = strlen($password);  
       $confirmLength = strlen($confirmPW);
       $mailLength = strlen($email);

       if (($logLength >=5) && ($passLength >=5) && ($logLength >=5) && ($logLength >=5)) { echo 'cc3';
           $myID = $_SESSION['id']; 
           $select = $this->db->prepare("SELECT * FROM utilisateurs WHERE id=:myID");
           $select->bindValue(":myID", $_SESSION['utilisateur']['id']);
           $select->execute();
           $fetch = $select->fetch();

       // var_dump($count);
       // var_dump($password); 
       // var_dump($confirmPW);

           if ($confirmPW==$password) {
               echo "cc4";
               $cryptedpass = password_hash($password, PASSWORD_BCRYPT); // CRYPTED 
               var_dump($cryptedpass);
               $update = ($this->db)->prepare("UPDATE utilisateurs SET login = :login, password = :cryptedpass, email= :mail WHERE id = :myID"); 
               $update->bindParam(":login", $login, PDO::PARAM_STR);
               $update->bindParam(":cryptedpass",$cryptedpass, PDO::PARAM_STR);
               $update->bindParam(":myID", $_SESSION['utilisateur']['id'], PDO::PARAM_INT);
               $update->bindParam(":mail",$email, PDO::PARAM_STR);
               
               var_dump($_SESSION['utilisateur']['id']);
               $update->execute(); 
           
           }
           else  $error_log="Confirmation du mot de passe incorrect"; 
           
       }
       else $error_log = "Veuillez insérer au moins 5 caractères dans chaques champs"; 
   }
    else {$error_log = "veuillez remplir les champs";}
    
    {if (isset ($error_log)) {
       return $error_log;
   }}
}

}
?>