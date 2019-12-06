<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";


// recuperation des donnees GET, POST, et SESSION
    
// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

$mailU = getMailULoggedOn();
$utilisateurs = getUtilisateurs();


// traitement si necessaire des donnees recuperees

                

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "modifier le profil";
include "$racine/vue/vueAdmin.php";

