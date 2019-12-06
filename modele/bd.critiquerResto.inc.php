<?php

include_once "bd.inc.php";

function getCritiques(){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from CritiquerResto");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getCritiquesByIdR($idR){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from CritiquerResto where idR=:idR");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getCritiquesByMailU($mailU){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from CritiquerResto where mailU=:mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getCommentaireActif(){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from CritiquerResto where commentaireActif=1");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getCommentaireNonActif(){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from CritiquerResto where commentaireActif=0");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

/** ---------------------------------------------------------------------------------------- **/
/** Fait le 15/11/2019 **/

function deleteCritiquerRestoByMailU($mailU){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM CritiquerResto where mailU=:mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->execute();
        
    } catch (Exception $ex) {
        print "Erreur !: " . $e->getMessage();
        die();
        
    }
    
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    //header('Content-Type:text/plain');

    echo "getCritiques() : \n";
    print_r(getCritiques());
    echo"<br/>";
    
    echo "getCritiquesByIdR(1) : \n";
    print_r(getCritiquesByIdR(1));
    echo"<br/>";
    
    echo "getCritiquesByMailU() : \n";
    print_r(getCritiquesByMailU('beta'));
    echo"<br/>";
    
    echo "getCommentaireActif() : \n";
    print_r(getCommentaireActif());
    echo"<br/>";

    echo "getCommentaireNonActif() : \n";
    print_r(getCommentaireNonActif());
    echo"<br/>";
}

?>

