<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.restaurant.inc.php";
include_once "$racine/modele/bd.plat.inc.php";
include_once "$racine/modele/bd.type_plat.inc.php";
//à ne pas oublier
$lesTypesDePlats = getTypesPlat();
$idR = $_GET["idR"];
print_r($idR);

$ajoute = false;
$msg="";
// recuperation des donnees GET, POST, et SESSION
       
if (isset($_POST["nomP"]) && isset($_POST["prixFournisseurP"]) && isset($_POST["idTP"]) && isset($_POST["prixClientP"]) && isset($_POST["descriptionP"]) && isset($_POST["platVisible"])){
        
        $nomP = $_POST["nomP"];  
        $prixFournisseurP = $_POST["prixFournisseurP"];
        $idTP = $_POST['idTP'];
        $prixClientP = $_POST["prixClientP"];
        $phtoP = $_POST["photoP"];
        $descriptionP = $_POST["descriptionP"];
        $platVisible = $_POST["platVisible"];
        
      
        addPlat($idR, $idTP, $nomP, $prixFournisseurP, $prixClientP,$photoP, $descriptionP, $platVisible);
        
        $ajoute = true;
       
    }
 else {
    $msg="Renseigner tous les champs...";    
    }

//CHANGER LA PARTIE EN BAS ET L'ADAPTER
if ($ajoute == true) {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Plat ajouté";
    //include "$racine/vue/entete.html.php";
    include "$racine/vue/vueConfirmationAjoutPlat.php";
    //include "$racine/vue/pied.html.php";
} else {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Ajout plat pb";
    //include "$racine/vue/entete.html.php";
    include "$racine/vue/vueAjoutPlat.php";
    //include "$racine/vue/pied.html.php";
}
?>