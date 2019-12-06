<?php

include_once "bd.inc.php";

function getCommandes(){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Commande");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getCommandeByIdC($idC){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Commande where idC=:idC");
        $req->bindValue(':idC', $idC, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getCommandeBymailU($mailU){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Commande where mailU=:mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getCommandeByDateC($dateC){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Commande where dateC=:dateC");
        $req->bindValue(':dateC', $dateC, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addUneCommande($mailU,$dateC,$dateLivrC,$modeReglementC,$appreciationEasyFood,$noteEasyFood){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("insert into Commande(mailU,dateC,dateLivrC,modeReglementC,appreciationEasyFood,appreciationVisible,noteEasyFood) values(:mailU,:dateC,:dateLivrC,:modeReglementC,:appreciationEasyFood,1,:noteEasyFood)");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->bindValue(':dateC', $dateC, PDO::PARAM_STR);
        $req->bindValue(':dateLivrC', $dateLivrC, PDO::PARAM_STR);
        $req->bindValue(':modeReglementC', $modeReglementC, PDO::PARAM_STR);
        $req->bindValue(':appreciationEasyFood', $appreciationEasyFood, PDO::PARAM_STR);
        $req->bindValue(':noteEasyFood', $noteEasyFood, PDO::PARAM_INT);
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

function getIdcByMailU($mailU){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select idC from Commande where mailU=:mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function deleteCommandeByMailU($mailU){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM Commande where mailU=:mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->execute();
        
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
        
    }
    
}

/** ---------------------------------------------------------------------------------------- **/
/** Fait le 22/11/2019 **/


if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    //header('Content-Type:text/plain');
    
    echo "getIdcByMailU(sup)";
    print_r(getIdcByMailU("sup@gmail.com"));
    
}

?>

