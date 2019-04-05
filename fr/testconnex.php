<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test connexion</title>
</head>
<body>
    
<?php     
    require "C:\laragon\www\web\medwish\script\scriptConnexionBase.php"; // Inclusion de notre bibliothèque de fonctions
 
    $db = connexionBase(); // Appel de la fonction de connexion

    // Renvoi de l'enregistrement sous forme d'un objet

    $requete = "SELECT * FROM users ";

    $result = $db->query($requete);

    var_dump($db);

    if (!$result) {
        $tableauErreurs = $db->errorInfo();
        echo $tableauErreur[2]; 
        die("Erreur dans la requête");
    }
    
    if ($result->rowCount() == 0) {
    // Pas d'enregistrement
    die("La table est vide");
    }
    ?>
            
            <table >
            <thead>
            <tr>
            <th scope="col" class ="titreCentre">Users_Id</th>
            <th scope="col" class ="titreCentre">Users_Login</th>
            <th scope="col" class ="titreCentre">Users_Password</th>
            <th scope="col" class ="titreCentre">Users_Name</th>
            <th scope="col" class ="titreCentre">Users_Surname</th>
            <th scope="col" class ="titreCentre">Users_Gender</th>
            <th scope="col" class ="titreCentre">Users_Nationnality</th>
            <th scope="col" class ="titreCentre">Users_Birthdate</th>
            <th scope="col" class ="titreCentre">Users_Address1</th>
            <th scope="col" class ="titreCentre">Users_Address2</th>
            <th scope="col" class ="titreCentre">Users_City</th>
            <th scope="col" class ="titreCentre">Users_CP</th>
            <th scope="col" class ="titreCentre">Users_State</th>
            <th scope="col" class ="titreCentre">Users_Country</th>
            <th scope="col" class ="titreCentre">Users_Phone</th>
            <th scope="col" class ="titreCentre">Users_Mail</th>
            <th scope="col" class ="titreCentre">Users_Job</th>
            </tr>
            </thead>
            <?php
            
            while ($row = $result->fetch(PDO::FETCH_OBJ))
            {   
                echo"<tr>";
                echo"<td>".$row->Users_Id."</td>";
                echo"<td>".$row->Users_Login."</td>";
                echo"<td>".$row->Users_Password."</td>";
                echo"<td>".$row->Users_Name."</td>";
                echo"<td>".$row->Users_Surname."</td>";
                echo"<td>".$row->Users_Gender."</td>";
                echo"<td>".$row->Users_Nationnality."</td>";
                echo"<td>".$row->Users_Birthdate."</td>";
                echo"<td>".$row->Users_Address1."</td>";
                echo"<td>".$row->Users_Address2."</td>";
                echo"<td>".$row->Users_City."</td>";
                echo"<td>".$row->Users_CP."</td>";
                echo"<td>".$row->Users_State."</td>";
                echo"<td>".$row->Users_Country."</td>";
                echo"<td>".$row->Users_Phone."</td>";
                echo"<td>".$row->Users_Mail."</td>";
                echo"<td>".$row->Users_Job."</td>";
                echo"</tr>";
            }

            echo "</table>"; 
            ?>


</body>
</html>