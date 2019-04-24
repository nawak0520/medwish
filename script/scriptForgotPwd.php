<?php 

require "scriptConnexionBase.php";
require "FonctionCrudLib.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion en base
session_start();


if(isset($_POST['envoiMailBis'])) {   

    $recupMail = $_POST['recupMail'];
	echo $recupMail; echo('<br>');



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
		
		$_SESSION["flag"] = false;
		
		echo '<body onLoad="alert(\'Adresse Mail inexistante!\'); window.location=\'../fr/login.html\';">';
	}

	
	$_SESSION["login_users"] = $row->Users_Name; 
    $_SESSION["pwd_users"] = $row->Users_Password;
    $_SESSION["email_users"] = $recupMail;
    $_SESSION["id_users"] = $row->Users_Id;
	$_SESSION["flag"] = true;
	
	echo($_SESSION["login_users"]);echo("ici <br>");
	echo($_SESSION["pwd_users"]);echo("ici 2<br>");
	echo($_SESSION["email_users"]);echo("ici 3 <br>");
	echo($_SESSION["id_users"]);echo("ici 4<br>");
	echo($_SESSION["flag"]);echo("ici 5<br>");


$mail = $_SESSION["email_users"]; // Déclaration de l'adresse de destination.
$sujetEnvoi = "Hey mon ami !"; //sujet du mail a envoyer
$messageEnvoi = "Veuillez-cliquez sur le lien ci-dessous pour modifier votre mot de passe
<a href=\"http://localhost/web/medwish/fr/forgot.html?Users_id=".$_SESSION["pwd_users"]."\">Mon nouveau mot de passe</a>";

//recuperation du type de mail par rapport au serveur (problème des passage de ligne source OpenClassrooms)

superMail($messageEnvoi, $sujetEnvoi, $mail);

// if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn|outlook|gmail).[a-z]{2,4}$#", $mail))
// {
// 	$passage_ligne = "\r\n";
// }
// else
// {
// 	$passage_ligne = "\n";
// }

// //=====Déclaration des messages au format texte et au format HTML.
// $message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";
// $message_html = "<html>
// 					<head></head>
// 					<body>
// 					<b>Bonjour</b><br>
// 					Veuillez-cliquez sur le lien ci-dessous pour modifier votre mot de passe
// 					<a href=\"http://localhost/web/medwish/fr/forgot.html?Users_id=".$_SESSION["pwd_users"]."\">Mon nouveau mot de passe</a>
// 					</body>
// 					</html>";
// //==========
// //_SESSION["pwd_users"].
// //==========

// //=====Création de la boundary
// $boundary = "-----=".md5(rand());
// //==========
 
// //=====Définition du sujet.
// $sujet = "Hey mon ami !";
// //=========

// $header = "From: \"blockchaintiti@gmail.com\"<blockchaintiti@gmail.com>".$passage_ligne;
// $header.= "Reply-to: \"blockchaintiti@gmail.com\" <blockchaintiti@gmail.com>".$passage_ligne; 
// $header.= "MIME-Version: 1.0".$passage_ligne; 
// $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

// //=====Création du message.
// $message = $passage_ligne."--".$boundary.$passage_ligne;

// $message = "...";
// $message .= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
// $message .= "Content-Transfer-Encoding: 8bit".$passage_ligne;
// $message .= $passage_ligne.$message_txt.$passage_ligne;
// //==========
// $message.= $passage_ligne."--".$boundary.$passage_ligne;
// //=====Ajout du message au format HTML
// $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
// $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
// $message.= $passage_ligne.$message_html.$passage_ligne;
// //==========
// $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
// $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
// //==========
// //echo($message);
// //=====Envoi de l'e-mail.
// mail($mail,$sujet,$message,$header);
// echo '<body onLoad="alert(\'verifier votre boite mail!\'); window.location=\'../fr/login.html\';">';
 }
// //==========

if (isset($_POST['Pwd_BDD'])){

	$confirm_Pwd =password_hash($_POST['confirm_Pwd'], PASSWORD_DEFAULT);

	$requete = "update Users set Users_Password = ? where Users_Id = ?";

	$stmt = $db->prepare($requete);

    $stmt->bindParam(1, $confirm_Pwd );
    $stmt->bindParam(2, $_SESSION["id_users"]);

	$stmt->execute();

	echo($_SESSION["login_users"]);echo("ici <br>");
	echo($_SESSION["pwd_users"]);echo("ici 2<br>");
	echo($_SESSION["email_users"]);echo("ici 3 <br>");
	echo($_SESSION["id_users"]);echo("ici 4<br>");
	echo($_SESSION["flag"]);echo("ici 5<br>");
	var_dump ($db->errorInfo());
	
	echo '<body onLoad="alert(\'Mot de passe modifié, Connectez-vous!\'); window.location=\'../fr/login.html\';">';

}

decoBase($db);

?>

  