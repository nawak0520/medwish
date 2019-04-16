<?php 


if(isset($_POST['envoiMailBis'])) {   

    $recupMail = $_POST['recupMail'];
	echo $recupMail;

	require "scriptConnexionBase.php"; // Inclusion de notre bibliothèque de fonctions
	$db = connexionBase(); // Appel de la fonction de connexion en base

	$requete1 = "SELECT * FROM users WHERE Users_Mail = '$recupMail'";

	$result1 = $db->query($requete1);

//test si $result est vide avec renvoie d erreur
	if (!$result1) 
	{
		$tableauErreurs = $db->errorInfo();
		echo $tableauErreur[2]; 
		die("Erreur dans la requête");
	} 

	//test si $result possède des lignes
	if ($result1->rowCount() == 0) 
	{
		//ouverture session 
		session_start();
		$_SESSION["flag"] = false;

		deconnexionBase($db, $result1);
		
		echo '<body onLoad="alert(\'Adresse Mail inexistante!\'); window.location=\'../fr/login.html\';">';
	}
}
else{

	session_start();
	$_SESSION["login_users"] = $row->Users_Name;
    $_SESSION["pwd_users"] = $PassWd;
    $_SESSION["email_users"] = $email;
    $_SESSION["id_users"] = $row->Users_Id;
    $_SESSION["flag"] = true;


$mail = $_POST['recupMail'];; // Déclaration de l'adresse de destination.

//recuperation du type de mail par rapport au serveur (problème des passage de ligne source OpenClassrooms)

if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn|outlook|gmail).[a-z]{2,4}$#", $mail))
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}

//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";
$message_html = "<html><head></head><body><b>Salut à tous</b>, voici un e-mail envoyé par un <i>script PHP</i>.</body></html>";
//==========

//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "Hey mon ami !";
//=========

$header = "From: \"blockchaintiti@gmail.com\"<blockchaintiti@gmail.com>".$passage_ligne;
$header.= "Reply-to: \"blockchaintiti@gmail.com\" <blockchaintiti@gmail.com>".$passage_ligne; 
$header.= "MIME-Version: 1.0".$passage_ligne; 
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;

$message = "...";
$message .= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message .= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
 
//=====Envoi de l'e-mail.
//mail($mail,$sujet,$message,$header);
//==========
}


// // recuperation du type de serveur par le mail (problème des passage de ligne source OpenClassrooms)
// if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
// {
// 	$passage_ligne = "\r\n";
// }
// else
// {
// 	$passage_ligne = "\n";
// }
// <?php if(isset($error)) 
// 						{ 
// 							echo '<span style="color:red">'.$error.'</span>'; 
// 						}
// 						else { echo ""; } 


























?>

  