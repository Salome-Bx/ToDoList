 <?php
    include('autoload.php');
    session_start();

    use DbConnexion\DbConnexion;
    use Task\Task;
    use TaskManager\TaskManager;


    //Récupération éléments tâches

    $data = file_get_contents("php://input");
    $task = (json_decode($data, true));

    $objTask = new Task($task);


    $dbConnexion = new DbConnexion();
    $taskManager = new TaskManager($dbConnexion);





    if ($taskManager->createTask($objTask)) {

        echo "createTask : success";
    } else {

        echo "createTask : didn't work";
    }

    ?>