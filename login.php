<?php
include("autoload.php");
session_start();

use DbConnexion\DbConnexion;
use User\User;
use UserManager\UserManager;





if (isset($_POST['Email_User_Connexion']) && isset($_POST['Mdp_User_Connexion'])
&& !empty($_POST['Email_User_Connexion']) && !empty($_POST['Mdp_User_Connexion']) 
{
    // validate
    $mail = htmlspecialchars($_POST['Mdp_User_Connexion']);
    


    $data = file_get_contents("php://input");
    $user = (json_decode($data, true));


    $dbConnexion = new DbConnexion();
    $userManager = new UserManager($dbConnexion);

    

    var_dump($user["email"], $user["password"]);

    if ($userManager->login($user["email"], $user["password"])) {
       
        echo "success";
    }else{
        echo"didn't work";
    }
}
