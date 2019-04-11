<?php 

$none = "";

if(isset($_POST['REGISTER'])) {    
    $Login = $_POST['login'];
    $email = $_POST['eMail'];
    $PassWd = $_POST['Mdp'];
}
else{
    echo '<body onLoad="alert(\'Erreur dans le Register... Recommencez\'); window.location=\'../fr/signup.html\';">';
}

    

require "scriptConnexionBase.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion en base

$requete1 = "SELECT * FROM users WHERE Users_Mail = '$email' or Users_Login = '$Login'";

$result = $db->query($requete);

//test si $result est vide avec renvoie d erreur
    if (!$result) 
    {
        $tableauErreurs = $db->errorInfo();
        echo $tableauErreur[2]; 
        die("Erreur dans la requête");
    } 

// test si $result possède des lignes
    if ($result->rowCount() == 0) 
    {
        deconnexionBase($db, $result);
        // ouverture session 
        session_start();
        $_SESSION["flag"] = false;

        // affiche le message d'alerte + redirection sur la page login.html
        echo '<body onLoad="alert(\'Membre non reconnu...Réessayer\'); window.location=\'../fr/login.html\';">';           
    }
    else
    {   
        deconnexionBase($db, $result);
        // ouverture session
        session_start();
        $_SESSION["login_users"] = $row->nom_users;
        $_SESSION["pwd_users"] = $pwd_users;
        $_SESSION["email_users"] = $mail_users;
        $_SESSION["id_users"] = $row->id_users;
        $_SESSION["flag"] = true;

        header("Location:../user/dashboard.html");
        exit;  
    }


$requete3 = "insert into users (Users_Login, Users_Password, Users_Name, Users_Surname, Users_Gender, Users_Nationnality,"." 
Users_Address1, Users_Address2, Users_City, Users_CP, Users_State, Users_Country, Users_Phone, Users_Mail, Users_Job)"." 
values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; //req insertion en base

$stmt = $db->prepare($requete); //preparation req avec camouflage parametre

$stmt->bindParam(1, $Login);
$stmt->bindParam(2, $PassWd);
$stmt->bindParam(3, $none);
$stmt->bindParam(4, $none);
$stmt->bindParam(5, $none);
$stmt->bindParam(6, $none);
$stmt->bindParam(7, $none);
$stmt->bindParam(8, $none);
$stmt->bindParam(9, $none);
$stmt->bindParam(10, $none);
$stmt->bindParam(11, $none);
$stmt->bindParam(12, $none);
$stmt->bindParam(13, $none);
$stmt->bindParam(14, $email);
$stmt->bindParam(15, $none);


$stmt->execute();

var_dump ($db->errorInfo());

deconnexionBase($db, $result);
        // ouverture session
session_start();
$_SESSION["login_users"] = $row->Users_Name;
$_SESSION["pwd_users"] = $PassWd;
$_SESSION["email_users"] = $email;
$_SESSION["id_users"] = $row->Users_Id;
$_SESSION["flag"] = true;

header("Location:../user/dashboard.html"); 

