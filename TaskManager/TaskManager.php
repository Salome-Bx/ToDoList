<?php

namespace TaskManager;



use DbConnexion\DbConnexion;
use Task\Task;
use PDO;


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
            $stmt = $this->pdo->query("SELECT tdl_task.*, GROUP_CONCAT(tdl_category.Nom_Category) AS Category_List, tdl_priority.Nom_Priority FROM tdl_task INNER JOIN tdl_categorise ON tdl_task.Id_Task = tdl_categorise.Id_Task INNER JOIN tdl_category ON tdl_category.Id_Category = tdl_categorise.Id_Category INNER JOIN tdl_priority ON tdl_priority.Id_Priority = tdl_task.Id_Priority GROUP BY tdl_task.Id_Task;");

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

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





    public function createTask(task $objTask)
    {

        $id_user = $_SESSION["userId"];
        $titre = $objTask->getTitre_task();
        $description = $objTask->getDescription_task();
        $date = $objTask->getDate_task();
        $id_priority = $objTask->getId_priority();
        $array_category = $objTask->getArray_Category();

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
            $id_task = $this->pdo->lastInsertId();

            if ($id_task) {
                foreach ($array_category as $valeur) {
                    try {
                        $stmt = $this->pdo->prepare("INSERT INTO tdl_categorise VALUES(?,?)");
                        $stmt->execute([$valeur, $id_task]);
                    } catch (\PDOException $e) {
                        // erreur
                        var_dump($e);
                    }
                }
            }

            return $stmt->rowCount() == 1;
        } catch (\PDOException $e) {
            // erreur
            var_dump($e);
        }
    }
}
