<?php

$none = "";

if(isset($_POST['REGISTER'])) {    //verif si 'REGISTER' est definie
    $Login = $_POST['login'];
    $email = $_POST['eMail'];
    $PassWd = password_hash($_POST['Mdp'], PASSWORD_DEFAULT); // on hash le password
}
else{
    echo '<body onLoad="alert(\'Error Register... try again!\'); window.location=\'../signup.html\';">';
    exit;
}

require "../../script/scriptConnexionBase.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion en base

$requete1 = "SELECT * FROM users WHERE Users_Mail = '$email' or Users_Login = '$Login'";

$result = $db->query($requete1);

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

    //req d'insertion dans la Base  
    $requete2 = "insert into users (Users_Login, Users_Password, Users_Name, Users_Surname, Users_Gender, "." 
    Users_Address1, Users_Address2, Users_City, Users_CP, Users_State, Users_Phone, Users_Mail, Users_Job)"." 
    values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; //req insertion en base

    $stmt = $db->prepare($requete2); //preparation req avec camouflage parametre

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
    $stmt->bindParam(12, $email);
    $stmt->bindParam(13, $none);

    $stmt->execute(); //execution requete insertion

    //var_dump ($db->errorInfo());

    // on recup le plus grand Id soit le dernier rentré en base
    $requete3 = "SELECT Max(Users_Id) as Users_Id from users";
    $result = $db->query($requete3);
    $row = $result->fetch((PDO::FETCH_OBJ));

    //on recup les infos du dernier utilisateur pour ouvrir une session
    $requete4 = "SELECT * FROM users WHERE Users_Id = '$row->Users_Id' ";
    $result = $db->query($requete4);
    $row2 = $result->fetch((PDO::FETCH_OBJ));
    
    // ouverture session
    session_start();
    $_SESSION["login_users"] = $row2->Users_Login;      //echo($_SESSION["login_users"]);echo("<br>");
    $_SESSION["pwd_users"] = $PassWd;                   //echo($_SESSION["pwd_users"]);echo("<br>");
    $_SESSION["email_users"] = $email;                  //echo($_SESSION["email_users"]);echo("<br>");
    $_SESSION["id_users"] = $row2->Users_Id;            //echo($_SESSION["id_users"]);echo("<br>");
    $_SESSION["flag"] = true;                           //echo($_SESSION["flag"]);echo("<br>");

    deconnexionBase($db, $result);
    echo '<body onLoad="alert(\'Welcome on Medwish, please login\'); window.location=\'../login.html\';">';        
}
else 
{
    echo '<body onLoad="alert(\'Existing member... enter new login or email\'); window.location=\'../signup.html\';">';
    // destruction et reouverture session 
    session_start();
    $_SESSION["flag"] = false;
    deconnexionBase($db, $result);
}
