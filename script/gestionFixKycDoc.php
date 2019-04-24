<?php

session_start();
require "scriptConnexionBase.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase();


if(isset($_POST["supprimer"])){
    
    $id=($_POST["supprimer"]);"<br><br>";
    //echo ($_SESSION["id_Users"]);
    echo "okkkkkkk11111111";

    $requete = "delete from evidence where Evi_Users_Id = ?";

    $stmt = $db->prepare($requete);
    $stmt->bindParam(1, $_POST["supprimer"]);
    $stmt->execute();
    var_dump ($db->errorInfo());

    $requete = "SELECT * FROM Users WHERE Users_Id = '$id'";

    $result = $db->query($requete);
	$row = $result->fetch(PDO::FETCH_OBJ);

    $mail = $row->Users_Mail;

    var_dump ($db->errorInfo());


    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn|outlook|gmail).[a-z]{2,4}$#", $mail))
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}

//=====D&eacute;claration des messages au format texte et au format HTML.
$message_txt = "Bonjour les informations envoy&eacute;s concernant la verification de votre identit&eacute; ne correspondent pas, elles vont donc etre SUPPRIMER.
                V&eacute;rifier que les informations contenu dans votre profil correspondent aux &eacute;l&eacute;ment que vous renverez dans le KYC";
$message_html = "<html>
					<head></head>
					<body>
					<b>Bonjour</b><br>
					les informations envoy&eacute;s concernant la verification de votre identit&eacute; ne correspondent pas.
                    V&eacute;rifier que les informations contenu dans votre profil correspondent aux &eacute;l&eacute;ment envoy&eacute; dans le KYC
					</body>
					</html>";
//==========
//_SESSION["pwd_users"].
//==========

//=====Cr&eacute;ation de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====D&eacute;finition du sujet.
$sujet = "Erreur dans vos informations";
//=========

$header = "From: \"blockchaintiti@gmail.com\"<blockchaintiti@gmail.com>".$passage_ligne;
$header.= "Reply-to: \"blockchaintiti@gmail.com\" <blockchaintiti@gmail.com>".$passage_ligne; 
$header.= "MIME-Version: 1.0".$passage_ligne; 
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

//=====Cr&eacute;ation du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;

$message = "...";
$message .= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message .= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message .= $passage_ligne.$message_txt.$passage_ligne;
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
//echo($message);
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
echo '<body onLoad="alert(\'Un mail d\'erreur est envoy&eacute;!\'); window.location=\'../AdminFixKycDoc.php\';">';
}

else if (isset($_POST["valider"]))
{   
    $conf = "1";
    $id= ($_POST["valider"]);"<br>";
    echo "okkkkkkk222222222";

    $requete = "update evidence set Evi_Conf = ? where Evi_Users_Id = ?";
    
    $stmt = $db->prepare($requete);
    $stmt->bindParam(1, $conf);
    $stmt->bindParam(2, $_POST["valider"]);
    $stmt->execute();
    var_dump ($db->errorInfo());

    $requete = "SELECT * FROM Users WHERE Users_Id = '$id'";

    $result = $db->query($requete);
	$row = $result->fetch(PDO::FETCH_OBJ);

    $mail = $row->Users_Mail;

    var_dump ($db->errorInfo());

    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn|outlook|gmail).[a-z]{2,4}$#", $mail))
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}

//=====D&eacute;claration des messages au format texte et au format HTML.
$message_txt = "Bonjour les informations envoy&eacute;s concernant la verification de votre identit&eacute; correspondent correctement.";
$message_html = "<html>
					<head></head>
					<body>
					<b>Bonjour</b><br>
					les informations envoy&eacute;s concernant la verification de votre identit&eacute; correspondent correctement.
                    </body>
					</html>";
//==========
//_SESSION["pwd_users"].
//==========

//=====Cr&eacute;ation de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====D&eacute;finition du sujet.
$sujet = "validation de vos informations! ";
//=========

$header = "From: \"blockchaintiti@gmail.com\"<blockchaintiti@gmail.com>".$passage_ligne;
$header.= "Reply-to: \"blockchaintiti@gmail.com\" <blockchaintiti@gmail.com>".$passage_ligne; 
$header.= "MIME-Version: 1.0".$passage_ligne; 
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

//=====Cr&eacute;ation du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;

$message = "...";
$message .= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message .= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message .= $passage_ligne.$message_txt.$passage_ligne;
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
//echo($message);
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
echo '<body onLoad="alert(\'Un mail de confirmation est envoy&eacute;!\'); window.location=\'../AdminFixKycDoc.php\';">';
}

else {

    $id = ($_POST["info"]);"<br>";
    echo "okkkkkkkkkk33333333";

    $requete = "SELECT * FROM Users WHERE Users_Id = '$id'";

    $result = $db->query($requete);
	$row = $result->fetch(PDO::FETCH_OBJ);

    $mail = $row->Users_Mail;

    var_dump ($db->errorInfo());


    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn|outlook|gmail).[a-z]{2,4}$#", $mail))
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}

//=====D&eacute;claration des messages au format texte et au format HTML.
$message_txt = "Bonjour les informations envoy&eacute;s concernant la verification de votre identit&eacute; ne sont pas suffisantes.
                Veuillez remplir &eacute;galement votre profil Medwish à partir du dashboard";
$message_html = "<html>
					<head></head>
					<body>
					<b>Bonjour</b><br>
                    les informations envoy&eacute;s concernant la verification de votre identit&eacute; ne sont pas suffisantes.
                    Veuillez remplir &eacute;galement votre profil Medwish à partir du dashboard.
                    </body>
					</html>";
//==========
//_SESSION["pwd_users"].
//==========

//=====Cr&eacute;ation de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====D&eacute;finition du sujet.
$sujet = "Information manquante!";
//=========

$header = "From: \"blockchaintiti@gmail.com\"<blockchaintiti@gmail.com>".$passage_ligne;
$header.= "Reply-to: \"blockchaintiti@gmail.com\" <blockchaintiti@gmail.com>".$passage_ligne; 
$header.= "MIME-Version: 1.0".$passage_ligne; 
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

//=====Cr&eacute;ation du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;

$message = "...";
$message .= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message .= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message .= $passage_ligne.$message_txt.$passage_ligne;
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
//echo($message);
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
echo '<body onLoad="alert(\'Un mail de demande d\'info est envoyé!\'); window.location=\'../AdminFixKycDoc.php\';">';

}