 <?php
    include('autoload.php');
    session_start();

    use DbConnexion\DbConnexion;
    use Task\Task;
    use TaskManager\TaskManager;


    //Récupération éléments tâches

    $data = file_get_contents("php://input");
    $task = (json_decode($data, true));
    var_dump($task);




    $dbConnexion = new DbConnexion();
    $taskManager = new TaskManager($dbConnexion);


    if ($taskManager->deleteTask($task)) {
        // echo json_encode(["status" => "succes", "message" => "Tâche supprimée avec succès"]);
        echo true;
    } else {

        echo false;
        //  json_encode(["status" => "erreur", "message" => "La tâche n'a pas été supprimée"]);
    }





    ?>