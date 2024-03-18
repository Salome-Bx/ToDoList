<?php

namespace UserManager;

use DbConnexion\DbConnexion;
use User\User;

class UserManager
{

    private $pdo;

    public function __construct(DbConnexion $dbConnexion)
    {
        // On récupère la fonctin getPdo de DbConnexion
        $this->pdo = $dbConnexion->getPDO();
    }
    
    public function login(string $email_user,string $mdp_user )
    
    {
    
    $hash = hash("whirlpool",$mdp_user);
        
    $sql = "SELECT * FROM tdl_user WHERE Email_User = :email AND Mdp_User = :mdp";

    $statement = $this->pdo->prepare($sql);
    $statement->bindParam(':email', $email_user);
    $statement->bindParam(':mdp', $hash);
    $retour = $statement->execute();
    

    return $retour; 

    }


    public function insertUser(User $objet)
        {

            // Dans les paramètres on récupére un objet $objet 
            // formaté par la classe Product
            // Du coup on peut utiliser les getters
            $prenom = $objet->getPrenom_user();
            $nom = $objet->getNom_user();
            $mdp = $objet->getMdp_user();
            

            try {
                // Ici on requête 
                // prepare sert a nettoyer la donnée avant insertion
                // Attention d'avoir le bon nombre de champs dans la requête)
                $stmt = $this->pdo->prepare("INSERT INTO products VALUES(NULL,?,?,?,?,?)");

                // Ici la requête est éxécutée après nettoiement, attention à avoir le même 
                // ordre que dans votre bdd.
                $stmt->execute([$name, $description, $price, $image, $id_category]);

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