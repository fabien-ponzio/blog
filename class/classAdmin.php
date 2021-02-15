<?php 
class Admin{
    public $login; 
    public $password; 
    public $id_droits; 

    // if isset de bouton alors on update le droits utilisateur de l'USER 
    // public function updateUser($login, $password, $id_droits){
    //     if (isset ($_POST['mod'])) {
    //         $variable = "Utilisateur"; 
    //         $id_droitsUpdate = 1;
    //         $variable = "Modérateur"; 
    //         $id_droitsUpdate = 42;
    //         $variable = "Admin"; 
    //         $id_droitsUpdate = 1337;
    //         $selectUser ="SELECT * FROM utilisateurs WHERE id_droits = 1" ; 
    //         var_dump($selectUser);
    //         $selectModo = "SELECT * FROM utilisateurs WHERE id_droits = 42"; 
    //         var_dump($selectModo); 
    //         $selectAdmin="SELECT * FROM utilisateurs WHERE id_droits = 1337"; 
    //         var_dump($selectAdmin); 
    //     }
    // public function updateUser($id, $id_droits){
        // pour chaque affichage d'utilisateur mettre un bouton modifier et supprimer 
        // bouton modifier et supprimer aura un input caché (hidden) avec un name qui sera déclenché par un isset et une value qui sera l'ID 
        //function qui affiche un utilisateur par rapport à l'hidden input avec un bouton update 
        // relier le bouton update avec un isset qui active une fonction update 
    // }
    // }

    public function updateRights($login, $id_droits){
    
        $query = $this->db->prepare ("UPDATE utilisateurs SET id_droits=:id WHERE id=:login"); 
    
        $query->bindValue(":id", $id_droits, PDO::PARAM_INT); 
        $query->bindValue(":login", $login, PDO::PARAM_STR); 
    
        $query->execute();
        var_dump($query); 
    
    
    }


}

?>