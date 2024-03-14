<?php 
namespace Task;

class Task{

    private $id_task;
    private $nom_task;
    private $description_task;
    private $date_task;
    private $priorite_task;
    private $category_task;
    private $id_user;
    private $id_priority;

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
        return $this->id_task;
    }

    /**
     * Set the value of id_task
     *
     * @return  self
     */ 
    public function setId_task($id_task)
    {
        $this->id_task = $id_task;

        return $this;
    }

    /**
     * Get the value of nom_task
     */ 
    public function getNom_task()
    {
        return $this->nom_task;
    }

    /**
     * Set the value of nom_task
     *
     * @return  self
     */ 
    public function setNom_task($nom_task)
    {
        $this->nom_task = $nom_task;

        return $this;
    }

    /**
     * Get the value of description_task
     */ 
    public function getDescription_task()
    {
        return $this->description_task;
    }

    /**
     * Set the value of description_task
     *
     * @return  self
     */ 
    public function setDescription_task($description_task)
    {
        $this->description_task = $description_task;

        return $this;
    }

    /**
     * Get the value of date_task
     */ 
    public function getDate_task()
    {
        return $this->date_task;
    }

    /**
     * Set the value of date_task
     *
     * @return  self
     */ 
    public function setDate_task($date_task)
    {
        $this->date_task = $date_task;

        return $this;
    }

    

    /**
     * Get the value of priorite_task
     */ 
    public function getPriorite_task()
    {
        return $this->priorite_task;
    }

    /**
     * Set the value of priorite_task
     *
     * @return  self
     */ 
    public function setPriorite_task($priorite_task)
    {
        $this->priorite_task = $priorite_task;

        return $this;
    }

    /**
     * Get the value of category_task
     */ 
    public function getCategory_task()
    {
        return $this->category_task;
    }

    /**
     * Set the value of category_task
     *
     * @return  self
     */ 
    public function setCategory_task($category_task)
    {
        $this->category_task = $category_task;

        return $this;
    }

    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
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
}
