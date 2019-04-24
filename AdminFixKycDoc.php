<?php

session_start();

if ($_SESSION['id_users'] == "bigbro10"){ //si une session est bien ouverte on autorise la gstion des evidences

?>

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

        require "script/scriptConnexionBase.php";   // Inclusion de notre bibliothèque de fonctions
        $db = connexionBase();                      // Appel de la fonction de connexion

        $requete = "SELECT * FROM users INNER JOIN evidence WHERE Evi_Users_Id = Users_Id and Evi_Conf = false";
        // req sql qui selectionn toute les users ayant des preuves d'identité non-verifié

        $result = $db->query($requete);             //exec req
        
        if (!$result) {                             //si $result existe pas
            $tableauErreurs = $db->errorInfo();     //on recup les erreurs produite que l'on place dans un tableau
            echo $tableauErreur[2];                 //on affiche les erreur place en indice 2 du tableau
            die("Erreur dans la requête");
        }
        
        if ($result->rowCount() == 0) {             //si $result existe mais sans resultat
            // Pas d'enregistrement
            die("toute les preuves d'identité ont été géré");
        }

        // $row = $result->fetch(PDO::FETCH_OBJ);
        // $_SESSION["id_Evidence"] = $row->Evi_Id;
        // echo ($_SESSION["id_Evidence"]);
        // $_SESSION["id_Users"] = $row->Evi_Users_Id; echo ($_SESSION["id_Users"]);
        // $_SESSION["flag_modif"] = true;
    
        ?>
        <form action="script\gestionFixKycDoc.php" onsubmit= "return ConfirmMessage(this)" method="post"> <!--ouverture du tableau qui affiche toute les evidences en attente de gestion -->
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
                while ($row = $result->fetch(PDO::FETCH_OBJ)) //tant que toute les resultats ne sont pas traiter affichage dans le tableau 
                {   
                    echo"<tr>";?>
                        <td><img src="proof/proofIdentity/<?php echo $row->Evi_Users_Id.'.'.$row->Evi_Document;?>" id="<?php echo $row->Evi_Users_Id.'.'.$row->Evi_Document;?>" onclick="javascript:openModalImg(this)" class = "img-fluid" alt="Responsive image"></td>
                        <td><img src="proof/proofSelfi/<?php echo $row->Evi_Users_Id.'.'.$row->Evi_Selfie;?>" id="<?php echo $row->Evi_Users_Id.'.'.$row->Evi_Selfie;?>" onclick="javascript:openModalImg(this)" class ="img-fluid" alt="Responsive image"></td>
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

            <!-- le Modal des images-->
            <div id="myModal" class="modal">

                <!-- la croix qui ferme le modal -->
                <span class="close" onclick="javascript:closeModalImg()">&times;</span>

                <!-- ce que contient le modal -->
                <img class="modal-content" id="img01">

            </div>

        </form>
        <br>
        <br>
        
        <script type="text/javascript">

        //var modal = document.getElementById('myModal');
        //var img = document.getElementById('myImg');
        //var modalImg = document.getElementById("img01");
        //var captionText = document.getElementById("caption");
        //img.onclick = function(){
        //modal.style.display = "block";
        //modalImg.src = this.src;
        //}

            function openModalImg(elt){                             //elt etant l'id en cours de la photo cliqué

                var modal = document.getElementById('myModal');     //on recup le modal
                // var img = document.getElementById(idImg); 
                var modalImg = document.getElementById("img01");    //on recup la balise qui contiendras notre image
                modal.style.display = "block";                      //on affiche le modal en le placant en block
                modalImg.src = elt.src;                             //on affecte la source de l'image en liste au modal
            }

            function closeModalImg(){
                var modal = document.getElementById('myModal');             //on recup le modal
                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];     //on recup la croix de fermeture
                modal.style.display = "none";                               //on modifie la vue pour faire disparaitre le modal
                
            }

            function ConfirmMessage(form) {                                 //function de demande de confirmation pour chaque choix sur les evidences

                if (confirm("Voulez-vous validez votre demande ?")) { 
                        return true;                
                }
                else return false;
}
            </script>

</body>
</html>

<?php
}
else{
echo '<body onLoad="alert(\'Connectez-vous pour acceder a cette partie du site\'); window.location=\'fr/login.html\';">';  //sinon redirection sur le login       
}

?>