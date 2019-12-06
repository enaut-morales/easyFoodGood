<?php

    /**
     * ----------------------------------------------------------------------------------------
     * Fait le 29/11/2019 */

include_once "$racine/modele/bd.restaurant.inc.php";
include_once "$racine/modele/bd.plat.inc.php";
include_once "$racine/modele/bd.type_plat.inc.php";

$lesRestos = getRestos();
$idR = $_GET["idR"];
$unResto = getRestoByIdR($idR);
$nomR = $unResto["nomR"];
$villeR = $unResto["villeR"];

$platsResto = getPlatByIdR($idR);