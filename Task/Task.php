<?php 
namespace Task;

class Task{

    private $Id_Task;
    private $Titre_Task;
    private $Description_Task;
    private $Date_Task;
    private $Categorie_Task;
    private $Id_User;
    private $Id_Priority;

    function __construct(array $datas){ 
        foreach ($datas as $key => $value) {
            $this->$key = $value;
        }
    }



    /**
     * Get the value of id_task
     */ 
    public function getId_task()
    {
        return $this->Id_Task;
    }

    /**
     * Set the value of id_task
     *
     * @return  self
     */ 
    public function setId_task($id_task)
    {
        $this->Id_Task = $id_task;

        return $this;
    }

    /**
     * Get the value of nom_task
     */ 
    public function getTitre_task()
    {
        return $this->Titre_Task;
    }

    /**
     * Set the value of nom_task
     *
     * @return  self
     */ 
    public function setTitre_task($titre_task)
    {
        $this->Titre_Task = $titre_task;

        return $this;
    }

    /**
     * Get the value of description_task
     */ 
    public function getDescription_task()
    {
        return $this->Description_Task;
    }

    /**
     * Set the value of description_task
     *
     * @return  self
     */ 
    public function setDescription_task($description_task)
    {
        $this->Description_Task = $description_task;

        return $this;
    }

    /**
     * Get the value of date_task
     */ 
    public function getDate_task()
    {
        return $this->Date_Task;
    }

    /**
     * Set the value of date_task
     *
     * @return  self
     */ 
    public function setDate_task($date_task)
    {
        $this->Date_Task = $date_task;

        return $this;
    }

    

    /**
     * Get the value of category_task
     */ 
    public function getCategory_task()
    {
        return $this->Categorie_Task;
    }

    /**
     * Set the value of category_task
     *
     * @return  self
     */ 
    public function setCategory_task($category_task)
    {
        $this->Categorie_Task = $category_task;

        return $this;
    }

    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->Id_User;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->Id_User = $id_user;

        return $this;
    }

    /**
     * Get the value of id_priority
     */ 
    public function getId_priority()
    {
        return $this->Id_Priority;
    }

    /**
     * Set the value of id_priority
     *
     * @return  self
     */ 
    public function setId_priority($id_priority)
    {
        $this->Id_Priority = $id_priority;

        return $this;
    }





}