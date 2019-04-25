<?php 

require "../../script/scriptConnexionBase.php";
require "../../script/FonctionCrudLib.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion en base
session_start();


if(isset($_POST['envoiMailBis'])) {   

    $recupMail = $_POST['recupMail'];
	//echo $recupMail; echo('<br>');

	$requete1 = "SELECT * FROM users WHERE Users_Mail = '$recupMail'";

	$result = $db->query($requete1);
	$row = $result->fetch(PDO::FETCH_OBJ);

//test si $result est vide avec renvoie d erreur
	if (!$result) 
	{
		$tableauErreurs = $db->errorInfo();
		echo $tableauErreur[2]; 
		die("Error DB");
	} 

	//test si $result possède des lignes
	if ($result->rowCount() == 0) 
	{
		//destruction et reouverture session 
		session_destroy();
        session_start();
        $_SESSION["id_users"] = null;
        $_SESSION["flag"] = false;

        deconnexionBase($db, $result);
		
		echo '<body onLoad="alert(\'No email address available!\'); window.location=\'../login.html\';">';
	}

	
	$_SESSION["login_users"] = $row->Users_Name; 
    $_SESSION["pwd_users"] = $row->Users_Password;
    $_SESSION["email_users"] = $recupMail;
    $_SESSION["id_users"] = $row->Users_Id;
	$_SESSION["flag"] = true;
	
	// echo($_SESSION["login_users"]);
	// echo($_SESSION["pwd_users"]);
	// echo($_SESSION["email_users"]);
	// echo($_SESSION["id_users"]);
	// echo($_SESSION["flag"]);


	$mail = $_SESSION["email_users"]; // Déclaration de l'adresse de destination.
	$sujetEnvoi = "Hey my friend !"; //sujet du mail a envoyer
	$messageEnvoi = "Please click on the following link to change your password
	<a href=\"http://localhost/web/medwish/en/forgot.html?Users_id=".$_SESSION["pwd_users"]."\">My new password</a>";

//recuperation du type de mail par rapport au serveur (problème des passage de ligne source OpenClassrooms)

	superMail($messageEnvoi, $sujetEnvoi, $mail);
	echo '<body onLoad="alert(\'An email was sent, please check your mail box!\'); window.location=\'../login.html\';">';
}


if (isset($_POST['Pwd_BDD'])){

	$confirm_Pwd =password_hash($_POST['confirm_Pwd'], PASSWORD_DEFAULT);

	$requete = "update Users set Users_Password = ? where Users_Id = ?";

	$stmt = $db->prepare($requete);

    $stmt->bindParam(1, $confirm_Pwd );
    $stmt->bindParam(2, $_SESSION["id_users"]);

	$stmt->execute();

	// echo($_SESSION["login_users"]);
	// echo($_SESSION["pwd_users"]);
	// echo($_SESSION["email_users"]);
	// echo($_SESSION["id_users"]);
	// echo($_SESSION["flag"]);
	//var_dump ($db->errorInfo());
	
	echo '<body onLoad="alert(\'Changed password, please login!\'); window.location=\'../login.html\';">';
}

deconnexionBase($db, $result)

?>

  