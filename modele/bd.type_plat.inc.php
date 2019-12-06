<?php

include_once "bd.inc.php";


function getTypesPlat(){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from TypePlat");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getTypePlatByIdTP($idTP){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from TypePlat where idTP=:idTP");
        $req->bindValue(':idTP', $idTP, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getTypePlatByLibelleTP($libelleTP){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from TypePlat where libelleTP like :libelleTP");
        $req->bindValue(':libelleTP', "%".$libelleTP."%", PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}




if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "getTypesPlat() : \n";
    print_r(getTypesPlat());
    echo "<br/>";
    echo "<br/>";

    echo "getTypePlatByIdTP() : \n";
    print_r(getTypePlatByIdTP(1));
    echo "<br/>";
    echo "<br/>";
    
    echo "getTypePlatByLibelleTP('gri') : \n";
    print_r(getTypePlatByLibelleTP('gri'));
    echo "\n";
    echo "\n";

}
