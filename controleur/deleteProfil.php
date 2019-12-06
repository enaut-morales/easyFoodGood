<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.tarifer.inc.php";
include_once "$racine/modele/bd.commande.inc.php";
include_once "$racine/modele/bd.critiquerResto.inc.php";

$mailU = getMailULoggedOn();
$lesIdC = getIdcByMailU($mailU);

$listIdC = array();

for($i =0; $i < count($lesIdC); $i++){
    
    deleteTariferByIdC($lesIdC[$i]["idC"]);    

 }

deleteCommandeByMailU($mailU);
deleteCritiquerRestoByMailU($mailU);
deleteUtilisateurByMail($mailU);
logout();