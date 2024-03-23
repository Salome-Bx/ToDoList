<?php
include("autoload.php");
session_start();

use DbConnexion\DbConnexion;
use User\User;
use UserManager\UserManager;





$data = file_get_contents("php://input");
$user = (json_decode($data, true));


if (isset($user["email"]) && isset($user["password"]) && !empty($user["email"]) && !empty($user["password"])) {
    $dbConnexion = new DbConnexion();
    $userManager = new UserManager($dbConnexion);
}

$data = $userManager->login($user["email"], $user["password"]);
return $data;



?>



<?php


// 
?>

