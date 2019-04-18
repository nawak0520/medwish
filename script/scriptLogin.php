<?php 



$Users_Mail = $_POST['email_users'];
$Users_Password = $_POST['pwd_users'];

$adminLogin ="adminUser01!@gestion.kyc-document";
$password_Admin = "Medwish01!";

require "scriptConnexionBase.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion en base

if ($Users_Mail == $adminLogin && $Users_Password == $password_Admin)
{
    header("Location:../AdminFixKycDoc.php");
    exit;
}
else
{

//req sql qui va tester directement l'existence de l'utilisateur en base
$requete = "SELECT * FROM users WHERE Users_Mail ='$Users_Mail' ";
//AND Users_Password = '$Users_Password'

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
        // ouverture session 
        session_start();
        $_SESSION["flag"] = false;

        deconnexionBase($db, $result);

        // affiche le message d'alerte + redirection sur la page login.html
        echo '<body onLoad="alert(\'Membre non reconnu...Réessayer\'); window.location=\'../fr/login.html\';">';           
    }
    else if ($result->rowCount() > 0) 
    {   
        $row = $result->fetch((PDO::FETCH_OBJ));
        //var_dump($row);
        $verifMdp = $row->Users_Password;
        
        if (password_verify($Users_Password, $verifMdp))
        {
            // ouverture session
            session_start();
            $_SESSION["login_users"] = $row->Users_Name;
            $_SESSION["pwd_users"] = $Users_Password;
            $_SESSION["email_users"] = $Users_Mail;
            $_SESSION["id_users"] = $row->Users_Id;
            $_SESSION["flag"] = true;

            //fermeture connexion base
            deconnexionBase($db, $result);
            
            header("Location:../user/dashboard.html");
            exit; 
        }
        

        else {
        echo '<body onLoad="alert(\'Membre non reconnu...Réessayer\'); window.location=\'../fr/login.html\';">';           
    }
        
    }

}


    ?>