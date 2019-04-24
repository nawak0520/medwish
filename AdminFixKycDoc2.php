<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/styleAdminFixKyc.css">
    
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
            $requete = "SELECT * FROM users INNER JOIN evidence WHERE Evi_Users_Id = Users_Id and Evi_Conf = false";
            
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

            // $row = $result->fetch(PDO::FETCH_OBJ);

            // $_SESSION["id_Evidence"] = $row->Evi_Id;
            // echo ($_SESSION["id_Evidence"]);
   
            // $_SESSION["id_Users"] = $row->Evi_Users_Id; echo ($_SESSION["id_Users"]);
            // $_SESSION["flag_modif"] = true;

            
            ?>
            <form action="script\gestionFixKycDoc.php" onsubmit= "return ConfirmMessage(this)" method="post">
            <table class="table table-striped">
            <thead>
            <tr>
            <th scope="col" class ="titreCentre">Evi_Document</th>
            <th scope="col" class ="titreCentre">Evi_Selfie</th>
            <th scope="col" class ="titreCentre">Evi_Id</th>
            <th scope="col" class ="titreCentre">Evi_Type</th>
            <th scope="col" class ="titreCentre">Evi_numDoc</th>
            <th scope="col" class ="titreCentre">Evi_Users_Id</th>
            <th scope="col" class ="titreCentre">Name</th>
            <th scope="col" class ="titreCentre">Surname</th>
            <th scope="col" class ="titreCentre">Action possible</th>
            </tr>
            </thead>
            <?php
            

            while ($row = $result->fetch(PDO::FETCH_OBJ))
            {   
                echo"<tr>";?>
                <td><img src="proof/proofIdentity/<?php echo $row->Evi_Users_Id.'.'.$row->Evi_Document;?>" id="<?php echo $row->Evi_Users_Id.'.'.$row->Evi_Document;?>" onclick="javascript:openModalImg(this.id)" class = "img-fluid" alt="Responsive image"></td>
                <td><img src="proof/proofSelfi/<?php echo $row->Evi_Users_Id.'.'.$row->Evi_Selfie;?>" id="<?php echo $row->Evi_Users_Id.'.'.$row->Evi_Selfie;?>" onclick="javascript:openModalImg(this.id)" class ="img-fluid" alt="Responsive image"></td>
                <?php
                echo"<td>".$row->Evi_Id."</td>";
                echo"<td>".$row->Evi_Type."</td>";
                echo"<td>".$row->Evi_numDoc."</td>";
                echo"<td>".$row->Evi_Users_Id."</td>";
                echo"<td>".$row->Users_Name."</td>";
                echo"<td>".$row->Users_Surname."</td>";
                echo"<td>              
                <button class=\"btn btn-primary btn-sm btn-block\" role=\"button\" type=\"submit\" name=\"supprimer\" value=\"$row->Evi_Users_Id\">Supprimer</button>
                <button class=\"btn btn-primary btn-sm btn-block\" role=\"button\" type=\"submit\" name=\"valider\"  value=\"$row->Evi_Users_Id\">Valider</button>
                <button class=\"btn btn-primary btn-sm btn-block\" role=\"button\" type=\"submit\" name=\"info\"  value=\"$row->Evi_Users_Id\">Info manquante</button>
                </td>";
                echo"</tr>";
            }
            
            echo "</table>"; 
            ?>
            <input class="btn btn-primary" type="reset" onclick="window.location.reload()" value="Refresh"> 

            <!-- The Modal -->
            <div id="myModal" class="modal">

            <!-- The Close Button -->
            <span class="close" onclick="javascript:closeModalImg()">&times;</span>

            <!-- Modal Content (The Image) -->
            <img class="modal-content" id="img01">

        </div>

            </form>
            <br>
            <br>
            
            <script type="text/javascript">
            // Get the modal
            //var modal = document.getElementById('myModal');

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            //var img = document.getElementById('myImg');
            //var modalImg = document.getElementById("img01");
            //var captionText = document.getElementById("caption");
            //img.onclick = function(){
            //modal.style.display = "block";
            //modalImg.src = this.src;
            //captionText.innerHTML = this.alt;
            //}
            
            

                function openModalImg(idImg){
                    var modal = document.getElementById('myModal');
                    var img = document.getElementById('idImg'); 
                    console.log(img);   
                    var modalImg = document.getElementById("img01");
                    modal.style.display = "block";
                    modalImg.src = this.src;
                }

                function closeModalImg(idImg){
                    var modal = document.getElementById('myModal');
                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];
                    modal.style.display = "none";
                    
                }

                function ConfirmMessage(form) {

                    if (confirm("Voulez-vous validez votre demande ?")) { 
                         return true;
                    }
                    else return false;
   }
</script>

</body>
</html>