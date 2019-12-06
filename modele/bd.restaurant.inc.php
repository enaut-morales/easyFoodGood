<?php

include_once "bd.inc.php";

function getRestos(){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Restaurant");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getRestoByIdR($idR){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Restaurant where idR=:idR");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}



function getRestoByNomR($nomR){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Restaurant where nomR like :nomR");
        $req->bindValue(':nomR', "%".$nomR."%", PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getRestoByVilleR($villeR){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Restaurant where villeR like :villeR");
        $req->bindValue(':villeR', "%".$villeR."%", PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

/** ---------------------------------------------------------------------------------------- **/
/** Fait le 22/11/2019 **/

function getRestoBymailU($mailU){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Restaurant where mailU=:mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
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
    //header('Content-Type:text/plain');

    echo "getRestos() : \n";
    print_r(getRestos());
    echo"<br/>";
    echo"<br/>";
    
    echo "getRestoByIdR(2) : \n";
    print_r(getRestoByIdR(2));
    echo"<br/>";
    echo"<br/>";
    
    echo "getRestoByNomR(Mozar) : \n";
    print_r(getRestoByNomR('Mozar'));
    echo"<br/>";
    echo"<br/>";
    
    echo "getRestoByNomR(haspa) : \n";
    print_r(getRestoByVilleR('haspa'));
    echo"<br/>";
    echo"<br/>";
    
}
?>

