<?php 

namespace Priority;

class Priority {

    private $id_priority;
    private $nom_priority;


    function __construct(array $datas){

        
        foreach ($datas as $key => $value) {
            $this->$key = $value;
        }
    }



    


    /**
     * Get the value of id_priority
     */ 
    public function getId_priority()
    {
        return $this->id_priority;
    }

    /**
     * Set the value of id_priority
     *
     * @return  self
     */ 
    public function setId_priority($id_priority)
    {
        $this->id_priority = $id_priority;

        return $this;
    }

    /**
     * Get the value of nom_priority
     */ 
    public function getNom_priority()
    {
        return $this->nom_priority;
    }

    /**
     * Set the value of nom_priority
     *
     * @return  self
     */ 
    public function setNom_priority($nom_priority)
    {
        $this->nom_priority = $nom_priority;

        return $this;
    }
}


?>