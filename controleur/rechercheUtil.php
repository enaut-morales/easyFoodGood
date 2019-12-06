<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";

/**
* ----------------------------------------------------------------------------------------
* Fait le 22/11/2019 */

// recuperation des donnees GET, POST, et SESSION
$recherche = $_POST["recherche"];
    
    
// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$resultPrenom = getUtilisateursByPrenomU($recherche);
$resultNom = getUtilisateursByNomU($recherche);




// traitement si necessaire des donnees recuperees
$result = array();

if(count($resultPrenom != 0)){
    foreach($resultPrenom as $unResult){
        if(in_array($unResult, $result) == false){
            $result[]=$unResult;
        }
    }
}

if(count($resultNom != 0)){
    foreach($resultNom as $unResultNom){
        if(in_array($unResultNom, $result) == false){
            $result[]=$unResultNom;
        }
    }
}
          

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Recherche d'utilisateur";
include "$racine/vue/vueRechercheUtil.php";