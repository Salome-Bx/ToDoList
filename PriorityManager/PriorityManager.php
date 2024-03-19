<?php
namespace PriorityManager;

use Priority\Priority;
use DbConnexion\DbConnexion;

class PriorityManager
{
    private $pdo;

    public function __construct(DbConnexion $dbConnexion)
    {
        $this->pdo = $dbConnexion->getPDO();
    }

    public function allPriorities()
    {
        $priorities = [];

        try {
            $stmt = $this->pdo->query("SELECT * FROM tdl_priority");
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $priorities[] = new Priority($row);
            }
        } catch (\PDOException $e) {
            return $priorities;
        }
        return $priorities;
    }

    // public function insertPriority(Priority $objet)
    // {
    //     $name = $objet->getNameCategory();
    //     try {
    //         $stmt = $this->pdo->prepare("INSERT INTO tdl_priority (name) VALUES (?)");
    //         $stmt->execute([$name]);

    //         return $stmt->rowCount() == 1;
    //     } catch (\PDOException $e) {
    //         return false;
    //     }
    // }
}
