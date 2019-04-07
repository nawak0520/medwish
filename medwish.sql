DROP DATABASE medwish;
CREATE DATABASE medwish;
USE medwish;



#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Users
#------------------------------------------------------------

CREATE TABLE Users(
        Users_Id           Int  Auto_increment  NOT NULL ,
        Users_Login        Varchar (50) NOT NULL ,
        Users_Password     Varchar (50) NOT NULL ,
        Users_Name         Varchar (50) NOT NULL ,
        Users_Surname      Varchar (50) NOT NULL ,
        Users_Gender       Varchar (5)  NOT NULL ,
        Users_Nationnality Varchar (50) NOT NULL ,
        Users_Birthdate    Date ,
        Users_Address1     Varchar (150) NOT NULL ,
        Users_Address2     Varchar (150) NOT NULL ,
        Users_City         Varchar (50) NOT NULL ,
        Users_CP           Varchar (10) NOT NULL ,
        Users_State        Varchar (50) NOT NULL ,
        Users_Country      Varchar (50) NOT NULL ,
        Users_Phone        Varchar (20) NOT NULL ,
        Users_Mail         Varchar (50) NOT NULL ,
        Users_Job          Varchar (30) NOT NULL
	,CONSTRAINT Users_PK PRIMARY KEY (Users_Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Society
#------------------------------------------------------------

CREATE TABLE Society(
        Soc_Id                 Int  Auto_increment  NOT NULL ,
        Soc_Name               Varchar (50) NOT NULL ,
        Soc_Siret              Varchar (50) NOT NULL ,
        Soc_PresName           Varchar (50) NOT NULL ,
        Soc_PresSurname        Varchar (50) NOT NULL ,
        Soc_PresSouscript      Bool ,
        Soc_SouscriptName      Varchar (50) NOT NULL ,
        Soc_SouscriptSurname   Varchar (50) NOT NULL ,
        Soc_SouscriptGender    Varchar (5)  NOT NULL ,
        Soc_SouscriptBirthdate Date ,
        Soc_Address1           Varchar (150) NOT NULL ,
        Soc_Address2           Varchar (150) NOT NULL ,
        Soc_City               Varchar (50) NOT NULL ,
        Soc_CP                 Varchar (10) NOT NULL ,
        Soc_State              Varchar (50) NOT NULL ,
        Soc_Country            Varchar (50) NOT NULL ,
        Soc_Phone              Varchar (50) NOT NULL
	,CONSTRAINT Society_PK PRIMARY KEY (Soc_Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Evidence
#------------------------------------------------------------

CREATE TABLE Evidence(
        Evi_Id       Varchar (30) NOT NULL ,
        Evi_Type     Varchar (20) NOT NULL ,
        Evi_Document Varchar (50) NOT NULL ,
        Evi_Selfie   Varchar (50) NOT NULL ,
        Users_Id     Int NOT NULL ,
        Soc_Id       Int NOT NULL
	,CONSTRAINT Evidence_PK PRIMARY KEY (Evi_Id)

	,CONSTRAINT Evidence_Users_FK FOREIGN KEY (Users_Id) REFERENCES Users(Users_Id)
	,CONSTRAINT Evidence_Society0_FK FOREIGN KEY (Soc_Id) REFERENCES Society(Soc_Id)
	,CONSTRAINT Evidence_Users_AK UNIQUE (Users_Id)
	,CONSTRAINT Evidence_Society0_AK UNIQUE (Soc_Id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Appartenir
#------------------------------------------------------------

CREATE TABLE Appartenir(
        Soc_Id   Int NOT NULL ,
        Users_Id Int NOT NULL
	,CONSTRAINT Appartenir_PK PRIMARY KEY (Soc_Id,Users_Id)

	,CONSTRAINT Appartenir_Society_FK FOREIGN KEY (Soc_Id) REFERENCES Society(Soc_Id)
	,CONSTRAINT Appartenir_Users0_FK FOREIGN KEY (Users_Id) REFERENCES Users(Users_Id)
)ENGINE=InnoDB;



#------------------------------------------------------------
# suppression et création d'utilisateur
#------------------------------------------------------------

drop user 'useur1'@'%';
drop user 'admin'@'%';

flush privileges;

#------------------------------------------------------------
# attribution des droits en fonction des utilisateurs
#------------------------------------------------------------

CREATE USER 'admin'@'%' IDENTIFIED BY '0101';
CREATE USER 'useur1'@'%' IDENTIFIED BY '0000';

#------------------------------------------------------------
# attribution des droits en fonction des utilisateurs
#------------------------------------------------------------

GRANT ALL PRIVILEGES ON medwish TO 'admin'@'%';

GRANT SELECT ,INSERT, UPDATE ON medwish.* TO 'useur1'@'%' ;




