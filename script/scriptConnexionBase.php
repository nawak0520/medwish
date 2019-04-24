<?php
function connexionBase()
{
    // Paramètre de connexion au serveur de la BDD
    $host = "localhost";
    $login= "root";      
    $password="1234";    
    $base = "medwish";  
    
    
 
    try // tentative connexion a BDD
    {
        $db = new PDO('mysql:host=' .$host. ';charset=utf8;dbname=' .$base, $login, $password); 
        
        //genere un rapport d'erreur si probleme sur BDD
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
        return $db;
    }

    catch (Exception $e) // recuperation et affichage de l'erreur de connexion
    {
        echo 'Erreur : ' . $e->getMessage() . '<br>';
        echo 'N° : ' . $e->getCode() . '<br>';
        die('Connexion au serveur impossible.');
    } 
}

function deconnexionBase($db, $result)
{
    $db = null;
    $result = null;
}

function decoResult($result)
{
    $result = null;
}

function decoBase($db)
{
    $db = null;
}

?>