<?php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "acceuil.php";
    $lesActions["acceuil"] = "acceuil.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["monProfil"] = "monProfil.php";
    $lesActions["acceuil"] = "acceuil.php";
    $lesActions["modifierProfil"] = "modifierProfil.php";
    $lesActions["modifierNom"] = "modifierNom.php";
    $lesActions["modifierPrenom"] = "modifierPrenom.php";
    $lesActions["modifierAdresse"] = "modifierAdresse.php";
    $lesActions["deleteProfil"] = "deleteProfil.php";
        /**
    * ----------------------------------------------------------------------------------------
    * Admin */
    $lesActions["detailUtil"] = "detailUtil.php";
    $lesActions["rechercheUtil"] = "rechercheUtil.php";
    
    
    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["defaut"];
    }
}

?>