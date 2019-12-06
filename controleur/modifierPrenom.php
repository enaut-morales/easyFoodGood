<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";

if (isLoggedOn()) {


    if(isset($_POST["prenomU"])){

        
        $mailU = getMailULoggedOn();
        $prenomU = $_POST["prenomU"];
        ModifyPrenomByMailU($mailU, $prenomU);
        } 
        
        
    }
    
    /**
     * ----------------------------------------------------------------------------------------
     * Fait le 22/11/2019 */

    if(!isset($_POST["prenomU"])){
        $titre = "Modifier Prenom";
        include "$racine/vue/vueModifierPrenom.php";
    }
    else{
        include "$racine/controleur/monProfil.php";
    }

    


