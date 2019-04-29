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
		die("Erreur dans la requête");
	} 

	//test si $result possède des lignes
	if ($result->rowCount() == 0) 
	{
		//ouverture session 
		session_start();
		$_SESSION["flag"] = false;
		
		echo '<body onLoad="alert(\'Adresse Mail inexistante!\'); window.location=\'../login.html\';">';
	}

	
	$_SESSION["login_users"] = $row->Users_Name; 		//on affecte les valeurs de la base au variable de session
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
	$sujetEnvoi = "Hey mon ami !"; //sujet du mail a envoyer
	$messageEnvoi = "Veuillez-cliquez sur le lien ci-dessous pour modifier votre mot de passe
	<a href=\"http://localhost/web/medwish/fr/forgot.html?Users_id=".$_SESSION["pwd_users"]."\">Mon nouveau mot de passe</a>";

//recuperation du type de mail par rapport au serveur (problème des passage de ligne source OpenClassrooms)

	superMail($messageEnvoi, $sujetEnvoi, $mail);
	echo '<body onLoad="alert(\'Mot de passe modifié, Connectez-vous!\'); window.location=\'../login.html\';">';
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
	
	echo '<body onLoad="alert(\'Mot de passe modifié, Connectez-vous!\'); window.location=\'../login.html\';">';
}

deconnexionBase($db, $result)

?>

  