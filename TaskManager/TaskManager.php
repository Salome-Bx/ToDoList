<?php

namespace TaskManager;

use DbConnexion\DbConnexion;
use Task\Task;
use PDO;
use PDOException;

class TaskManager
{

    private $pdo;

    public function __construct(DbConnexion $dbConnexion)
    {
        // On récupère la fonctin getPdo de DbConnexion
        $this->pdo = $dbConnexion->getPDO();
    }
    
    // public function getAllTasks()
    // {
    // $sql = "SELECT * FROM tdl_task;";

    // $retour = $this->pdo->query($sql)->fetchAll(PDO::FETCH_CLASS, ".\Task\Task");

    // return $retour;

    // }


public function getAllTasks()
    {
        // On déclare une variable products comme tableau vide
        $tasks = [];

        try {
          
            // Le manager récupère l'instance de connexion pdo fournit par la classe DBConnexion
            // Il utilise cette instance de connexion et utilise la fonction query qui commme son nom l'indique
            // requête sur la bdd via notre instance de connexion
            $stmt = $this->pdo->query("SELECT * FROM tdl_task INNER JOIN tdl_category ON tdl_task.Categorie_Task = tdl_category.Id_Category");
            
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
              
                // Pour chaque ligne de résultat de la requête on ajoute 
                // cette ligne dans $products
                // au format Product ( notre classe qui agit comme un moule a gauffre)
                // Dans products se trouvera un tableau d'objet au format Product
                // Et donc avec les méthodes de classes ( getters et setters)
                $tasks[] = new Task($row);
                
            }
        } catch (\PDOException $e) {
          
            var_dump($e);
            // Ici si il y a une erreur on la var_dump
        }

        // Une fois la requete finie on return le tableau de products
        var_dump("HELLO6");
        return $tasks;
        
    }





    public function CreateThisTask(Task $task): bool{
    $sql = "INSERT INTO tdl_task (Id_Task, Titre_Task, Description_Task, Date_Task Priorite_Task, Categorie_Task, Id_User, Id_Priority) VALUES (:Id_Task, :Titre_Task, :Description_Task, :Date_Task :Priorite_Task, :Categorie_Task, :Id_User, :Id_Priority)";

    $statement = $this->pdo->prepare($sql);

    $retour = $statement->execute([
      ':Id_Task' => $task->getId_task(),
      ':Titre_Task' => $task->getTitre_task(),
      ':Description_Task' => $task->getDescription_task(),
      ':Date_Task' => $task->getDate_task(),
      ':Priorite_Task' => $task->getId_priority(),
      ':Categorie_Task' => $task->getCategory_task(),
      ':Id_User' => $task->getId_user(),
      ':Id_Priority' => $task->getId_priority()
    ]);

    return $retour;
  }
    

}