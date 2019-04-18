<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styleAdminFixKyc.css">
    <title>Document</title>
</head>
<body>
    
<br>
        <h1><strong>gestion des documents de verification d'identité</strong></h1>
        <br>

        <div class="container">
            <?php
            require "script/scriptConnexionBase.php"; // Inclusion de notre bibliothèque de fonctions
            $db = connexionBase(); // Appel de la fonction de connexion
            $requete = "SELECT * FROM evidence WHERE Evi_Conf = false ";
            
            $result = $db->query($requete);
            if (!$result) {
                $tableauErreurs = $db->errorInfo();
                echo $tableauErreur[2]; 
                die("Erreur dans la requête");
            }
            
            if ($result->rowCount() == 0) {
            // Pas d'enregistrement
            die("toute les preuves d'identité ont été géré");
            }
            ?>
            
            <table class="table table-striped">
            <thead>
            <tr>
            <th scope="col" class ="titreCentre">Evi_Document</th>
            <th scope="col" class ="titreCentre">Evi_Id</th>
            <th scope="col" class ="titreCentre">Evi_Document</th>
            <th scope="col" class ="titreCentre">Evi_numDoc</th>
            <th scope="col" class ="titreCentre">Evi_Selfie</th>
            <th scope="col" class ="titreCentre">Evi_Conf</th>
            <th scope="col" class ="titreCentre">Evi_Users_Id</th>
            <th scope="col" class ="titreCentre">Evi_Soc_Id</th>
            </tr>
            </thead>
            <?php
            

            while ($row = $result->fetch(PDO::FETCH_OBJ))
            {   
                echo"<tr>";?>
                <td><img src="jarditou_photos/<?php echo $row->pro_id.'.'.$row->pro_photo;?>" class = "img-fluid" alt="Responsive image"></td><?php
                echo"<td>".$row->Evi_Id."</td>";
                echo"<td>".$row->Evi_Type."</td>";
                //echo"<td><a href=\"detailProduit.php?pro_id=".$row->pro_id."\" title=".$row->pro_libelle.">".$row->pro_libelle."</a></td>";
                echo"<td>".$row->Evi_numDoc."</td>";
                echo"<td>".$row->pro_stock."</td>";
                echo"<td>".$row->pro_couleur."</td>";
                echo"<td>".$row->pro_d_ajout."</td>";
                echo"<td>".$row->pro_d_modif."</td>";
                echo"<td>".$row->pro_bloque."</td>";
                echo"</tr>";
            }
            
            echo "</table>"; 
            ?>
            
            <a class="btn btn-primary" href="formAjoutPro.php" role="button">Ajout Produit</a>
            <input class="btn btn-primary" type="reset" onclick="window.location.reload()" value="Refresh"> 
            
            <br>
            <br>




</body>
</html>