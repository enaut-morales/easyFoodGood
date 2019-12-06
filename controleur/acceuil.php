<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
//include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/authentification.inc.php";

// recuperation des donnees GET, POST, et SESSION


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


// traitement si necessaire des donnees recuperees
logout();
 // si l'utilisateur est connecté on redirige vers le controleur monProfil
    
    $titre = "acceuil";
    //include "$racine/vue/entete.html.php";
    include "$racine/vue/vueAcceuil.php";
    //include "$racine/vue/pied.html.php";

    // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    // appel du script de vue 


?>