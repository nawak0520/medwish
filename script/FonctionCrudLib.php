<?php

function superMail($messageEnvoi, $sujetEnvoi, $mailEnvoi){

    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn|outlook|gmail).[a-z]{2,4}$#", $mailEnvoi))
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}

//=====Déclaration des messages au format texte et au format HTML.
$message_txt = $messageEnvoi;
$message_html = "<html>
					<head></head>
					<body>
					<b>Bonjour</b><br>
					".$messageEnvoi.
					"</body>
					</html>";

//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = $sujetEnvoi;
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
mail($mailEnvoi,$sujet,$message,$header);
}



// function SelectSql ($requete){

//     $result = $db->query($requete);
//     $result->fetch(PDO::FETCH_OBJ);
//     $result = $db->query($requete);
            
//             if (!$result) {
//                 $tableauErreurs = $db->errorInfo();
//                 echo $tableauErreur[2]; 
//                 die("Erreur dans la requête");
//             }
            
//             if ($result->rowCount() == 0) {
//             // Pas d'enregistrement
//             die("toute les preuves d'identité ont été géré");
//             }
// }