<?php
session_start();

if(isset($_POST['confirmer']))  // on verifie que 'confirmer' est definie 
{    
    $typeDoc = $_POST['typeDoc'];   
    $numId = $_POST['numId'];       
    $idUser = $_SESSION["id_users"];
    //var_dump($_FILES);

}
else
{
    echo '<body onLoad="alert(\'Error in the form... Try again!\'); window.location=\'../user_En/kyc-documents.php\';">';
    exit;
}


// format accepter du fichier placer dans un tableau    
$aMimeTypes = array("image/jpeg", "image/pjpeg", "image/png", "image/x-png");

require "../../script/scriptConnexionBase.php";          // Inclusion de notre bibliothèque de fonctions
$db = connexionBase();                                   // appel de la fonction de connexion

$requete1 = "SELECT * FROM evidence WHERE Evi_Users_Id = '$idUser' or Evi_numDoc = '$numId'";

$result = $db->query($requete1);

//test si $result est vide avec renvoie d erreur
if (!$result) 
{
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreur[2]; 
    die("Error DB!");
} 

// test si $result possède des lignes
if ($result->rowCount() == 0) 
{

    // test si l'upload du fichier proof c'est bien passer
    if($_FILES['proof']['error'][0]==0) {

        // On extrait le type du fichier via l'extension FILE_INFO 
        $finfo = finfo_open(FILEINFO_MIME_TYPE);                            //ouverture base finfo                          
        $mimetype = finfo_file($finfo, $_FILES["proof"]["tmp_name"][0]);    //on recup le type MIME du fichier
        finfo_close($finfo);                                                //fermeture base info
        $typ2 = explode("/", $mimetype);                                    //on separe le "/" du reste de l'extension et on les places dans un tableau
        $jpg = $typ2[1];                                                    //on recup l'extension du type MIME

    } 
    else //sinon recherche le type d'erreur de l'upload
    { 
        switch ($_FILES['proof']['error'][0]) 
        { 
            case (UPLOAD_ERR_INI_SIZE): 
                $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
                echo $message;  
                break; 
            case UPLOAD_ERR_FORM_SIZE: 
                $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                echo $message; 
                break; 
            case UPLOAD_ERR_PARTIAL: 
                $message = "The uploaded file was only partially uploaded"; 
                echo $message; 
                break; 
            case UPLOAD_ERR_NO_FILE: 
                $message = "No file was uploaded"; 
                echo $message; 
                break; 
            case UPLOAD_ERR_NO_TMP_DIR: 
                $message = "Missing a temporary folder"; 
                echo $message; 
                break; 
            case UPLOAD_ERR_CANT_WRITE: 
                $message = "Failed to write file to disk"; 
                echo $message; 
                break; 
            case UPLOAD_ERR_EXTENSION: 
                $message = "File upload stopped by extension"; 
                echo $message; 
                break; 

            default: 
                $message = "Unknown upload error"; 
                echo $message; 
                break; 
            }
    }
         
    // test si l'upload du fichier selfiProofId c'est bien passer    
    if($_FILES['proof']['error'][1]==0) 
    {
        $finfo2 = finfo_open(FILEINFO_MIME_TYPE); 
        $mimetype2 = finfo_file($finfo2, $_FILES["proof"]["tmp_name"][1]); 
        finfo_close($finfo2); 
        $typ3 = explode("/", $mimetype2);
        $jpg2 = $typ3[1];
    } 
    else 
    { 
        switch ($_FILES['proof']['error'][1]) 
        { 
            case (UPLOAD_ERR_INI_SIZE): 
                $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
                echo $message;  
                break; 
            case UPLOAD_ERR_FORM_SIZE: 
                $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                echo $message; 
                break; 
            case UPLOAD_ERR_PARTIAL: 
                $message = "The uploaded file was only partially uploaded"; 
                echo $message; 
                break; 
            case UPLOAD_ERR_NO_FILE: 
                $message = "No file was uploaded"; 
                echo $message; 
                break; 
            case UPLOAD_ERR_NO_TMP_DIR: 
                $message = "Missing a temporary folder"; 
                echo $message; 
                break; 
            case UPLOAD_ERR_CANT_WRITE: 
                $message = "Failed to write file to disk"; 
                echo $message; 
                break; 
            case UPLOAD_ERR_EXTENSION: 
                $message = "File upload stopped by extension"; 
                echo $message; 
                break; 
        
            default: 
                $message = "Unknown upload error"; 
                echo $message; 
                break; 
        } 
    }

    // on verifie que l'extension du fichier proofId est autorisé avant de deplacer le fichier dans le repertoire definitif
    if (in_array($mimetype, $aMimeTypes))
    {
        move_uploaded_file($_FILES["proof"]["tmp_name"][0], "..\..\proof\proofIdentity\\".$idUser.".".$jpg); 
    } 
    else 
    {
        echo '<body onLoad="alert(\'Unauthorized file type\'); window.location=\'../user_En/kyc-documents.php\';">';
        exit;
    }

    // on verifie que l'extension du fichier selfiProofId est autorisé avant de deplacer le fichier dans le repertoire definitif
    if (in_array($mimetype2, $aMimeTypes))
    {
        move_uploaded_file($_FILES["proof"]["tmp_name"][1], "..\..\proof\proofSelfi\\".$idUser.".".$jpg2); 
    } 
    else 
    {
        echo '<body onLoad="alert(\'Unauthorized file type\'); window.location=\'../user_En/kyc-documents.php\';">';
        exit;
    }

    $conf = "0";
    //requète d'insertion en base avec mise a faux de conf pour verification dans l' admin 
    $requete = "insert into evidence (Evi_Type, Evi_Document, Evi_numDoc, Evi_Selfie, Evi_Conf, Evi_Users_Id) values (?, ?, ?, ?, ?, ?)";
    
    $stmt = $db->prepare($requete); //prepa req camouflage des paramêtres

    $stmt->bindParam(1, $typeDoc);
    $stmt->bindParam(2, $jpg);
    $stmt->bindParam(3, $numId);
    $stmt->bindParam(4, $jpg2);
    $stmt->bindParam(5, $conf);
    $stmt->bindParam(6, $idUser);

    $stmt->execute();
    
    //var_dump ($db->errorInfo());

    decoBase($db);

    echo '<body onLoad="alert(\'Your information will be verified by our teams\'); window.location=\'../user_En/dashboard.php\';">';
}
else {

    echo '<body onLoad="alert(\'this information already exists in our database!\'); window.location=\'../user_En/kyc-documents.php\';">';
}