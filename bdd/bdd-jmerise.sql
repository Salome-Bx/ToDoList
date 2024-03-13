#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        Id          Int  Auto_increment  NOT NULL ,
        Nom_User    Varchar (50) NOT NULL ,
        Prenom_User Varchar (50) NOT NULL ,
        Mdp_User    Varchar (50) NOT NULL ,
        Email_User  Varchar (80) NOT NULL
	,CONSTRAINT User_AK UNIQUE (Email_User)
	,CONSTRAINT User_PK PRIMARY KEY (Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Priority
#------------------------------------------------------------

CREATE TABLE Priority(
        Id_Priority  Int  Auto_increment  NOT NULL ,
        Nom_Priority Varchar (50) NOT NULL
	,CONSTRAINT Priority_PK PRIMARY KEY (Id_Priority)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Task
#------------------------------------------------------------

CREATE TABLE Task(
        Id_Task          Int  Auto_increment  NOT NULL ,
        Titre_Task       Varchar (50) NOT NULL ,
        Description_Task Varchar (50) NOT NULL ,
        Date_Task        Date NOT NULL ,
        Priorite_Task    Varchar (50) NOT NULL ,
        Categorie_Task   Varchar (50) NOT NULL ,
        Id               Int NOT NULL ,
        Id_Priority      Int NOT NULL
	,CONSTRAINT Task_PK PRIMARY KEY (Id_Task)

	,CONSTRAINT Task_User_FK FOREIGN KEY (Id) REFERENCES User(Id)
	,CONSTRAINT Task_Priority0_FK FOREIGN KEY (Id_Priority) REFERENCES Priority(Id_Priority)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Category
#------------------------------------------------------------

CREATE TABLE Category(
        Id_Category  Int  Auto_increment  NOT NULL ,
        Nom_Category Varchar (50) NOT NULL
	,CONSTRAINT Category_PK PRIMARY KEY (Id_Category)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: categorise
#------------------------------------------------------------

CREATE TABLE categorise(
        Id_Category Int NOT NULL ,
        Id_Task     Int NOT NULL
	,CONSTRAINT categorise_PK PRIMARY KEY (Id_Category,Id_Task)

	,CONSTRAINT categorise_Category_FK FOREIGN KEY (Id_Category) REFERENCES Category(Id_Category)
	,CONSTRAINT categorise_Task0_FK FOREIGN KEY (Id_Task) REFERENCES Task(Id_Task)
)ENGINE=InnoDB;

