<?php
include("autoload.php");
session_start();

use DbConnexion\DbConnexion;
use User\User;
use UserManager\UserManager;

    
    

   
    $data = file_get_contents("php://input");
    $user = (json_decode($data, true));

    
    if (isset($user["email"]) && isset($user["password"]) && !empty($user["email"]) && !empty($user["password"]) ) {
        $dbConnexion = new DbConnexion();
        $userManager = new UserManager($dbConnexion);
    }

 if ($userManager->login($user["email"], $user["password"])) {

        echo "success";

    } else {
        echo "didn't work";
    }


 ?>



<?php


// ?>

