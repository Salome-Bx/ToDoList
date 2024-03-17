<?php

namespace UserManager;

use DbConnexion\DbConnexion;
use User\User;

class UserManager
{

    private $pdo;

    public function __construct(DbConnexion $dbConnexion)
    {
        // On récupère la fonctin getPdo de DbConnexion
        $this->pdo = $dbConnexion->getPDO();
    }
    
    public function login(string $email_user,string $mdp_user )
    
    {
    
    $hash = hash("whirlpool",$mdp_user);


        // try {
        //     $stmt = $this->pdo->query("SELECT * FROM tdl_user WHERE Email_User = '$email_user' AND Mdp_User = '$hash' ");
        
    $sql = "SELECT * FROM tdl_user WHERE Email_User = :email AND Mdp_User = :mdp";

    $statement = $this->pdo->prepare($sql);
    $statement->bindParam(':email', $email_user);
    $statement->bindParam(':mdp', $hash);
    $retour = $statement->execute();
    

    return $retour;

 
       

    }



  






}