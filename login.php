<?php
include("autoload.php");
session_start();

use DbConnexion\DbConnexion;
use User\User;
use UserManager\UserManager;

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = (json_decode($data, true));


    $dbConnexion = new DbConnexion();
    $userManager = new UserManager($dbConnexion);

    if ($userManager->login($user["email_user"], $user["mdp_user"])) {
        echo "success";
    }else{
        echo"didn't work";
    }
}
