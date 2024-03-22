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

    public function login(string $email_user, string $mdp_user)

    {

        $sql = "SELECT * FROM `tdl_user` WHERE Email_User = :email";

        $statement = $this->pdo->prepare($sql);
        $statement->execute([':email' => $email_user]);
        $retour = $statement->fetch(PDO::FETCH_ASSOC);




        // return $retour;

        var_dump($retour);
        var_dump($retour["Mdp_User"]);
        var_dump($mdp_user);

        if ($retour) {
            $hashedPassword = $retour["Mdp_User"];
            if (password_verify($mdp_user, $hashedPassword)) {
                session_start();
                $_SESSION["userId"] = $retour['Id_User'];
                echo json_encode(["status" => "succes", "message" => "Vous êtes connecté"]);
            } else {
                echo json_encode(["status" => "erreur", "message" => "Le mot de passe est erroné"]);
            }
        } else {
            echo json_encode(["status" => "erreur", "message" => "Vous n'êtes pas enregistré"]);
        }
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
}
