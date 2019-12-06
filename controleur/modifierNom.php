<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";

if (isLoggedOn()) {


    if(isset($_POST["nomU"])){

        $mailU = getMailULoggedOn();
        $nomU = $_POST["nomU"];
        ModifyNomByMailU($mailU, $nomU);
        
    }    
    
    /**
     * ----------------------------------------------------------------------------------------
     * Fait le 22/11/2019 */

    if(!isset($_POST["nomU"])){
        $titre = "Modifier Nom";
        include "$racine/vue/vueModifierNom.php";
    }
    else{
        include "$racine/controleur/monProfil.php";
    }

}