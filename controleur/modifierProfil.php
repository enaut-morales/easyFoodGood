<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.inc.php";

/**
* ----------------------------------------------------------------------------------------
* Fait le 22/11/2019 */

// recuperation des donnees GET, POST, et SESSION
    
    $mailU = getMailULoggedOn();
    $util = getUtilisateurByMail($mailU);
    $prenom = $util["prenomU"];
    $nom = $util["nomU"];
    $cpU = $util["cpU"];
    $rueAdrU = $util["rueAdrU"];
    $numAdrU = $util["numAdrU"];
    $villeU = $util["villeU"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

// traitement si necessaire des donnees recuperees

                

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "modifier le profil";
include "$racine/vue/vueModifierProfil.php";

