<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";

if (isLoggedOn()) {


    if (isset($_POST["cpU"]) && isset($_POST["rueAdrU"]) && isset($_POST["numAdrU"]) && isset($_POST["villeU"])) {

        
        $mailU = getMailULoggedOn();
        $cpU = $_POST["cpU"];
        $rueAdrU = $_POST["rueAdrU"];
        $numAdrU = $_POST["numAdrU"];
        $villeU = $_POST["villeU"];
    
        if(isset($cpU) && isset($numAdrU) && isset($rueAdrU) && isset($villeU)){
            ModifyAdresseByMailU($mailU, $cpU, $rueAdrU, $numAdrU, $villeU);
        }
        
    }
    
    /**
     * ----------------------------------------------------------------------------------------
     * Fait le 22/11/2019 */
    
    if (!isset($_POST["cpU"]) || !isset($_POST["rueAdrU"]) || !isset($_POST["numAdrU"]) || !isset($_POST["villeU"])) {

        $titre = "Modifier adresse";
        include "$racine/vue/vueModifierAdresse.php";
    
    }
    else{
        include "$racine/controleur/monProfil.php";
    }
    
    
}