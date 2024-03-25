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
}
