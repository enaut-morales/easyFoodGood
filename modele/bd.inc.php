<?php

function connexionPDO() {
    $login = "charly.peltier";
    $mdp = "17/07/1998";
    $bd = "PPE3.2_2019_G1";
    $serveur = "192.168.20.15";

    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        print "Erreur de connexion PDO ";
        die();
    }
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog de test
    header('Content-Type:text/plain');

    echo "connexionPDO() : \n";
    print_r(connexionPDO());
}
?>