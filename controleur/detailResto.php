<?php

include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.restaurant.inc.php";
include_once "$racine/modele/bd.critiquerResto.inc.php";
include_once "$racine/modele/bd.plat.inc.php";
include_once "$racine/modele/bd.type_plat.inc.php";


$idR = $_GET["idR"];
$unResto = getRestoByIdR($idR);
$nomR = $unResto["nomR"];
$villeR = $unResto["villeR"];

$lesTypesDePlat = getTypesPlat();


include "$racine/vue/vueDetailResto.php";
