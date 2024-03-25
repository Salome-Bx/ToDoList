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

        // Dans les paramètres on récupére un objet $objet 
        // formaté par la classe Product
        // Du coup on peut utiliser les getters
        $prenom = $objet->getPrenom_user();
        $nom = $objet->getNom_user();
        $email = $objet->getEmail_user();
        $mdp = $objet->getMdp_user();
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);


        try {
            // Ici on requête 
            // prepare sert a nettoyer la donnée avant insertion
            // Attention d'avoir le bon nombre de champs dans la requête)
            $stmt = $this->pdo->prepare("INSERT INTO tdl_user VALUES(NULL,?,?,?,?)");

            // Ici la requête est éxécutée après nettoiement, attention à avoir le même 
            // ordre que dans votre bdd.
            $stmt->execute([$nom, $prenom, $mdp, $email]);

            // SI une ligne a été affectée par le  changement alors on renvoi true
            // Cela permettra d'utiliser cette fonction avec un if dans le traitement
            // If ( ca a fonctionné)
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
