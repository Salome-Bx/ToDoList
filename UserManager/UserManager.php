<?php


namespace UserManager;

use DbConnexion\DbConnexion;
use PDO;
use User\User;


class UserManager
{

    private $pdo;

    public function __construct(DbConnexion $dbConnexion)
    {
        // On récupère la fonctin getPdo de DbConnexion
        $this->pdo = $dbConnexion->getPDO();
    }

    public function login(string $email_user)

    {

        $sql = "SELECT * FROM tdl_user WHERE Email_User = :email";
        //vérifie si email utilisateur correspond avec email en BD
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':email' => $email_user]);
        $response = $statement->fetch(PDO::FETCH_ASSOC);

        return $response;
    }



    public function  saveUser(User $objet)
    {


        $prenom = $objet->getPrenom_user();
        $nom = $objet->getNom_user();
        $email = $objet->getEmail_user();
        $mdp = $objet->getMdp_user();
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);


        try {

            $stmt = $this->pdo->prepare("INSERT INTO tdl_user VALUES(NULL,?,?,?,?)");


            $stmt->execute([$nom, $prenom, $mdp, $email]);


            return $stmt->rowCount() == 1;
        } catch (\PDOException $e) {
            // erreur
            var_dump($e);
        }
    }


    public function userExist(User $objet)
    {
        $sql = "SELECT * FROM tdl_user WHERE Email_User = :email";
        $email = $objet->getEmail_user();
        $statement = $this->pdo->prepare($sql);
        $statement->execute([':email' => $email]);
        if ($statement->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
