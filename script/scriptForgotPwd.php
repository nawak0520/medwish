<?php 

echo($_POST['envoiMailBis']);
echo($_POST['recupMail']);
// verifie que le submit est ok
if (isset($_POST['envoiMailBis']))
{   
    // verifie que la variable est non vide
    if (!empty($_POST['recupMail'])){
        
        // supprime tout les caract non attendu, evite les injections de code
        $mail = htmlspecialchars($_POST['recupMail']);
        echo("33333333333");
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) //verifie un mail valide
        {
            echo("cccccccccccccccccccccc");
        }
        else 
        {
            echo '<body onLoad="alert(\'erreur dans le mail\'); window.location=\'../fr/login.html\'; ">';
        }
    }
    else 
    {
        echo '<body onLoad="alert(\'veuillez entrer votre mail\'); window.location=\'../fr/login.html\';">';
    }
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

  