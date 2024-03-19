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
    



    public function getAllTasks()
        {
            // On déclare une variable products comme tableau vide
            $tasks = [];

            try {
            
                // Le manager récupère l'instance de connexion pdo fournit par la classe DBConnexion
                // Il utilise cette instance de connexion et utilise la fonction query qui commme son nom l'indique
                // requête sur la bdd via notre instance de connexion
                $stmt = $this->pdo->query("SELECT * FROM `tdl_task`  
                INNER JOIN tdl_categorise ON tdl_task.Id_Task = tdl_categorise.Id_Task 
                INNER JOIN tdl_category ON tdl_category.Id_Category = tdl_categorise.Id_Category
                INNER JOIN tdl_priority ON tdl_priority.Id_Priority = tdl_task.Id_Priority");
                
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
            
            return $tasks;
            
        }





    public function createTask(Task $objet)
    {

        // Dans les paramètres on récupére un objet $objet 
        // formaté par la classe Product
        // Du coup on peut utiliser les getters
        $titre = $objet->getTitre_task();
        $description = $objet->getDescription_task();
        $date = $objet->getDate_task();
        $id_user = $objet->getId_user();
        $id_priority = $objet->getId_priority();

        try {
                // Ici on requête 
                // prepare sert a nettoyer la donnée avant insertion
                // Attention d'avoir le bon nombre de champs dans la requête)
            $stmt = $this->pdo->prepare("INSERT INTO tdl_task VALUES(NULL,?,?,?,?,?)");

                // Ici la requête est éxécutée après nettoiement, attention à avoir le même 
                // ordre que dans votre bdd.
            $stmt->execute([$titre, $description, $date, $id_user, $id_priority]);

                // SI une ligne a été affectée par le  changement alors on renvoi true
                // Cela permettra d'utiliser cette fonction avec un if dans le traitement
                // If ( ca a fonctionné)
            return $stmt->rowCount() == 1;
            
            } catch (\PDOException $e) {
                // erreur
                var_dump($e);
            }
        }


//     public function createTask(Task $task): bool{
//     $sql = "INSERT INTO tdl_task (Id_Task, Titre_Task, Description_Task, Date_Task Priorite_Task, Categorie_Task, Id_User, Id_Priority) VALUES (:Id_Task, :Titre_Task, :Description_Task, :Date_Task :Priorite_Task, :Categorie_Task, :Id_User, :Id_Priority)";

//     $statement = $this->pdo->prepare($sql);

//     $retour = $statement->execute([
//       ':Id_Task' => $task->getId_task(),
//       ':Titre_Task' => $task->getTitre_task(),
//       ':Description_Task' => $task->getDescription_task(),
//       ':Date_Task' => $task->getDate_task(),
//       ':Priorite_Task' => $task->getId_priority(),
//       ':Categorie_Task' => $task->getIdCategory(),
//       ':Id_User' => $task->getId_user(),
//       ':Id_Priority' => $task->getId_priority()
//     ]);

//     return $retour;
//   }




}