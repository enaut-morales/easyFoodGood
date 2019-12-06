<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.restaurant.inc.php";


if (isLoggedOn()){
    
    $mailU = getMailULoggedOn();
    $util = getUtilisateurByMail($mailU);
    $prenom = $util["prenomU"];
    $nom = $util["nomU"];
    $cpU = $util["cpU"];
    $rueAdrU = $util["rueAdrU"];
    $numAdrU = $util["numAdrU"];
    $villeU = $util["villeU"];
    $idTU = $util["idTU"];
    $restos = getRestoBymailU($mailU);

    // traitement si necessaire des donnees recuperees


    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Mon profil";
    include "$racine/vue/vueMonProfil.php";
}
else{
    $titre = "Mon profil";
}


if($idTU == 1){
    
    include "$racine/controleur/admin.php";

}

?>

<br/>
<a href="./?action=deconnexion">deconnexion</a>