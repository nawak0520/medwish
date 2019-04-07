<?php 


echo $_POST['email_users'];
echo $_POST['pwd_users'];
$Users_Mail = $_POST['email_users'];
$Users_Password = $_POST['pwd_users'];


require "scriptConnexionBase.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion en base

//req sql qui va tester directement l'existence de l'utilisateur en base
$requete = "SELECT * FROM users WHERE Users_Mail = '$Users_Mail' AND Users_Password = '$Users_Password'";

    
$result = $db->query($requete);


    if (!$result) 
    {
        $tableauErreurs = $db->errorInfo();
        echo $tableauErreur[2]; 
        die("Erreur dans la requête");
    } 

    if ($result->rowCount() == 0) 
    {
        // Pas d'enregistrement
        session_start();

        $_SESSION["flag"] = false;
        echo '<body onLoad="alert(\'Membre non reconnu...\'); window.location=\'C:\laragon\www\PHP\Medwish\medwish\fr\login.html\'">';
        //header("Location:formSessionStart.php");
        
        
    }
    else
    {

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