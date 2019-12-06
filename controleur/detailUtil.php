<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.critiquerResto.inc.php";
include_once "$racine/modele/bd.restaurant.inc.php";

// recuperation des donnees GET, POST, et SESSION
$mailULog = getMailULoggedOn();
$mailU = $_GET["mailU"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$util = getUtilisateurByMail($mailU);
$utilLog = getUtilisateurByMail($mailULog);
$nomU = $util["nomU"];
$prenomU = $util["prenomU"];

$critiques = getCritiquesByMailU($mailU);
$idRCritiques = array();

foreach ($critiques as $uneCritique){
    if(in_array($uneCritique['idR'], $idRCritiques) == false){
        $idRCritiques[] = $critiques['idR'];
    }
}

$restos = array();
foreach($idRCritiques as $unIdr){
    $restos[] = getRestoByIdR($unIdR);
}

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "detail d'un utilisateur";
include "$racine/vue/vueDetailUtil.php";
?>

