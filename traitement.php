<?php
include('autoload.php');
session_start();
use DbConnexion\DbConnexion;
use User\User;
use UserManager\UserManager;
use Task\Task;
use TaskManager\TaskManager;




    //Récupération éléments formulaire inscription

    $data = file_get_contents("php://input");
    $user = (json_decode($data, true));

    $obj =  new user($user);


    $dbConnexion = new DbConnexion();       
    $userManager = new UserManager($dbConnexion);

    
    
        
    if ($userManager->saveUser($obj)) {
      
        echo "save user : success";

    } else {

        echo "save user : didn't work";
    }


    //Récupération éléments tâches

    $data = file_get_contents("php://input");
    $user = (json_decode($data, true));

    $objTask =  new task($task);


    $dbConnexion = new DbConnexion();       
    $taskManager = new TaskManager($dbConnexion);

    

    
        
    if ($taskManager->createTask($objTask)) {
      
        echo "createTask : success";

    } else {

        echo "createTask : didn't work";
    }
   
