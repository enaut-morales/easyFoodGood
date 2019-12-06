<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";

$inscrit = false;
$msg="";
// recuperation des donnees GET, POST, et SESSION
       
if (isset($_POST["civiliteU"]) && isset($_POST["nomU"]) && isset($_POST["prenomU"]) && isset($_POST["mailU"]) && isset($_POST["mdpU"]) && isset($_POST["mdpU2"]) 
        && isset($_POST["cpU"]) && isset($_POST["rueAdrU"]) && isset($_POST["numAdrU"]) && isset($_POST["villeU"])) {

    if ($_POST["civiliteU"] != "" && $_POST["nomU"] != "" && $_POST["prenomU"] != "" && $_POST["mailU"] != "" && $_POST["mdpU"] != "" && $_POST["mdpU2"] != "" 
            && $_POST["cpU"] != "" && $_POST["rueAdrU"] != "" && $_POST["numAdrU"] != "" && $_POST["villeU"] != "") {
        $civiliteU = $_POST["civiliteU"];  
        $nomU = $_POST["nomU"];
        $prenomU = $_POST["prenomU"];
        $mailU = $_POST["mailU"];
        $mdpU = $_POST["mdpU"];
        $mdpU2 = $_POST["mdpU2"];
        $cpU = $_POST["cpU"];
        $rueAdrU = $_POST["rueAdrU"];
        $numAdrU = $_POST["numAdrU"];
        $villeU = $_POST["villeU"];
        
        // enregistrement des donnees
        if($mdpU == $mdpU2){
        $ret = addUtilisateur($mailU, $mdpU, $civiliteU, $nomU, $prenomU, $cpU, $rueAdrU, $numAdrU, $villeU);
        if ($ret) {
            $inscrit = true;
        } 
        }else {
            $msg = "l'utilisateur n'a pas été enregistré.";
        }
        
    }
 else {
    $msg="Renseigner tous les champs...";    
    }
}


if ($inscrit) {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Inscription confirmée";
    //include "$racine/vue/entete.html.php";
    include "$racine/vue/vueConfirmationInscription.php";
    //include "$racine/vue/pied.html.php";
} else {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Inscription pb";
    //include "$racine/vue/entete.html.php";
    include "$racine/vue/vueInscription.php";
    //include "$racine/vue/pied.html.php";
}
?>
