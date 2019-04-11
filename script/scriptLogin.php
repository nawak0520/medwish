<?php 



$Users_Mail = $_POST['email_users'];
$Users_Password = $_POST['pwd_users'];


require "scriptConnexionBase.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion en base

//req sql qui va tester directement l'existence de l'utilisateur en base
$requete = "SELECT * FROM users WHERE Users_Mail = '$Users_Mail' AND Users_Password = '$Users_Password'";

//exécut req    
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


    ?>