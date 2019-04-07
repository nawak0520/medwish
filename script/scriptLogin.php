<?php 

if (isset($_POST['submit'])) {
//This makes sure they did not leave any fields blank
    if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2'] ) {
    die('You did not complete all of the required fields');
    }
    // checks if the username is in use
    if (!get_magic_quotes_gpc()) {
    $_POST['username'] = addslashes($_POST['username']);
    }
    $usercheck = $_POST['username'];
    $check = mysql_query("SELECT username FROM users WHERE username = '$usercheck'")
    or die(mysql_error());
    $check2 = mysql_num_rows($check);
    //if the name exists it gives an error
    if ($check2 != 0) {
    die('Sorry, the username '.$_POST['username'].' is already in use.');
    }
    //this makes sure both passwords entered match
    if ($_POST['pass'] != $_POST['pass2']) {
    die('Your passwords did not match. ');
    }
    // here we encrypt the password and add slashes if needed
$_POST['pass'] = md5($_POST['pass']);
if (!get_magic_quotes_gpc()) {
$_POST['pass'] = addslashes($_POST['pass']);
$_POST['username'] = addslashes($_POST['username']);
}
// now we insert it into the database
$insert = "INSERT INTO users (username, password)
VALUES ('".$_POST['username']."', '".$_POST['pass']."')";
$add_member = mysql_query($insert);
?>
<h1>Registered</h1>
<p>Thank you, you have registered - you may now login</a>.</p>




$mail_users = $_POST['email_users'];
        $pwd_users = $_POST['pwd_users'];

        
        require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
        $db = connexionBase(); // Appel de la fonction de connexion
        $requete = "SELECT * FROM users WHERE email_users = '$mail_users' AND pwd_users = '$pwd_users'";

            
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
                echo '<body onLoad="alert(\'Membre non reconnu...\'); window.location=\'formSessionStart.php\';">';
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

                header("Location:listeProduit.php");
                exit;
                    
                
            }
            ?>