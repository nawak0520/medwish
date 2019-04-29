<?php

session_start();
require "script/scriptConnexionBase.php"; // Inclusion de notre bibliothèque de fonctions
require "script/FonctionCrudLib.php";
$db = connexionBase();


if(isset($_POST["supprimer"])){     //si clique sur btn supprimer
    
    $id=($_POST["supprimer"]);      // on affecte la valeur Evi_Users_Id du btn supprimer a $id
    //"<br><br>";
    //echo ($_SESSION["id_Users"]);
    //echo "okkkkkkk11111111";

    $requete = "delete from evidence where Evi_Users_Id = ?"; // requete suppression en base des information des preuves

    $stmt = $db->prepare($requete);             // preparation requete
    $stmt->bindParam(1, $_POST["supprimer"]);   // ajout des parametre (on evite injection de code)
    $stmt->execute();                           // on execute la deletion
    //var_dump ($db->errorInfo());

    $requete = "SELECT * FROM users WHERE Users_Id = '$id'";

    $result = $db->query($requete);
	$row = $result->fetch(PDO::FETCH_OBJ);

    $mail = $row->Users_Mail;   // Déclaration de l'adresse de destination.

    //var_dump ($db->errorInfo());

    // Déclaration de l'adresse de destination.
    $sujetEnvoi = "Erreur dans vos informations"; //sujet du mail a envoyer
    $messageEnvoi = "les informations envoy&eacute;s concernant la verification de votre identit&eacute; ne correspondent pas.
    V&eacute;rifier que les informations contenu dans votre profil correspondent aux &eacute;l&eacute;ment envoy&eacute; dans le KYC";
    //recuperation du type de mail par rapport au serveur (problème des passage de ligne source OpenClassrooms)
    
    superMail($messageEnvoi, $sujetEnvoi, $mail);
   
    echo '<body onLoad="alert(\'Un mail d\'erreur est envoy&eacute;!\'); window.location=\'AdminFixKycDoc.php\';">';
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

    $sujetEnvoi = "validation de vos informations!"; //sujet du mail a envoyer
    $messageEnvoi = "les informations envoy&eacute;s concernant la verification de votre identit&eacute; correspondent correctement.";
    //recuperation du type de mail par rapport au serveur (problème des passage de ligne source OpenClassrooms)
    
    superMail($messageEnvoi, $sujetEnvoi, $mail);

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

    $sujetEnvoi = "Information manquante!"; //sujet du mail a envoyer
    $messageEnvoi = "les informations envoy&eacute;s concernant la verification de votre identit&eacute; ne sont pas suffisantes.
    Veuillez remplir &eacute;galement votre profil Medwish à partir du dashboard.";
    //recuperation du type de mail par rapport au serveur (problème des passage de ligne source OpenClassrooms)
    
    superMail($messageEnvoi, $sujetEnvoi, $mail);

    echo '<body onLoad="alert(\'Un mail de demande d\'info est envoyé!\'); window.location=\'../AdminFixKycDoc.php\';">';

}