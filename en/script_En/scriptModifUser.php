<?php
session_start();
$none = "";

if(isset($_POST['EDIT'])) { 

    $firstname = $_POST['firstname'];       //echo($firstname);echo("<br>");
    $lastname = $_POST['lastname'];         //echo($lastname);echo("<br>");
    $gender = $_POST['gender'];             //echo($gender);echo("<br>");
    $nationality = $_POST['nationality'];   //echo($nationality);echo("<br>");
    $dateofbirth = $_POST['dateofbirth'];   //echo($dateofbirth);echo("<br>");
    $streetline = $_POST['streetline'];     //echo($streetline);echo("<br>");
    $streetline2 = $_POST['streetline2'];   //echo($streetline2);echo("<br>");
    $city = $_POST['city'];                 //echo($city);echo("<br>");
    $state = $_POST['state'];               //echo($state);echo("<br>");
    $zipcode = $_POST['zipcode'];           //echo($zipcode);echo("<br>");
    $county = $_POST['county'];             //echo($county);echo("<br>");
    $phone = $_POST['phone'];               //echo($phone);echo("<br>");
    $eMail = $_POST['eMail'];               //echo($eMail);echo("<br>");
    $job = $_POST['job'];                   //echo($job);echo("<br>");
}
else{
    echo '<body onLoad="alert(\'Error in your changes.... Do it again\'); window.location=\'../user_En/profil.php\';">';
}

require "../../script/scriptConnexionBase.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion en base



$requete = "update users set 
Users_Name = ?,
Users_Surname = ?,
Users_Gender = ?,
Users_Birthdate = ?,
Users_Address1 = ?,
Users_Address2 = ?,
Users_City = ?,
Users_CP = ?,
Users_State =?,
Users_Phone =?,
Users_Mail =?,
Users_Job =?,
Users_Country_id =?,
Users_Nationality_Id =?    where Users_Id = ?";

    $stmt = $db->prepare($requete);

    $stmt->bindParam(1, $_POST['firstname']);
    $stmt->bindParam(2, $_POST['lastname']);
    $stmt->bindParam(3, $_POST['gender']);
    $stmt->bindParam(4, $_POST['dateofbirth']);
    $stmt->bindParam(5, $_POST['streetline']);
    $stmt->bindParam(6, $_POST['streetline2']);
    $stmt->bindParam(7, $_POST['city']);
    $stmt->bindParam(8, $_POST['zipcode']);
    $stmt->bindParam(9, $_POST['state']);
    $stmt->bindParam(10, $_POST['phone']);
    $stmt->bindParam(11, $_POST['eMail']);
    $stmt->bindParam(12, $_POST['job']);
    $stmt->bindParam(13, $_POST['county']);
    $stmt->bindParam(14, $_POST['nationality']);
    $stmt->bindParam(15, $_SESSION["id_users"]);

    $stmt->execute();
    var_dump ($db->errorInfo());
    deconnexionBase($db, $result);
            
    header("Location:../user_En/dashboard.php");
    

