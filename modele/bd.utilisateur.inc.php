<?php

include_once "bd.inc.php";

function getUtilisateurs() {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Utilisateur");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUtilisateurByMail($mailU) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Utilisateur where mailU=:mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addUtilisateur($mailU, $mdpU, $civiliteU, $nomU, $prenomU, $cpU, $rueAdrU, $numAdrU, $villeU) {
    try {
        $cnx = connexionPDO();

        $mdpUCrypt = crypt($mdpU, "sel");
        $req = $cnx->prepare("insert into Utilisateur (mailU, mdpU, idTU, civiliteU, nomU, prenomU, cpU, rueAdrU, numAdrU, villeU) values(:mailU, :mdpU, 4, :civiliteU, :nomU,:prenomU,:cpU, :rueAdrU, :numAdrU, :villeU)");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->bindValue(':mdpU', $mdpUCrypt, PDO::PARAM_STR);
        $req->bindValue(':civiliteU', $civiliteU, PDO::PARAM_STR);
        $req->bindValue(':nomU', $nomU, PDO::PARAM_STR);
        $req->bindValue(':prenomU', $prenomU, PDO::PARAM_STR);
        $req->bindValue(':cpU', $cpU, PDO::PARAM_STR);
        $req->bindValue(':rueAdrU', $rueAdrU, PDO::PARAM_STR);
        $req->bindValue(':numAdrU', $numAdrU, PDO::PARAM_STR);
        $req->bindValue(':villeU', $villeU, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function ModifUtilisateur($mailU, $mdpU, $civiliteU, $nomU, $prenomU, $cpU, $rueAdrU, $numAdrU, $villeU) {
    try {
        $cnx = connexionPDO();

        $mdpUCrypt = crypt($mdpU, "sel");
        $req = $cnx->prepare("UPDATE Utilisateur SET mailU=:mailU, mdpU=:mdpU, civiliteU=:civiliteU, nomU=:nomU, prenomU=:prenomU, cpU=:cpU, rueAdrU=:rueAdrU, numAdrU=:numAdrU, villeU=:villeU  WHERE mailU=:mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->bindValue(':mdpU', $mdpUCrypt, PDO::PARAM_STR);
        $req->bindValue(':civiliteU', $civiliteU, PDO::PARAM_STR);
        $req->bindValue(':nomU', $nomU, PDO::PARAM_STR);
        $req->bindValue(':prenomU', $prenomU, PDO::PARAM_STR);
        $req->bindValue(':cpuU', $cpU, PDO::PARAM_STR);
        $req->bindValue(':rueAdrU', $rueAdrU, PDO::PARAM_STR);
        $req->bindValue(':numAdrU', $numAdrU, PDO::PARAM_STR);
        $req->bindValue(':villeU', $villeU, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function ModifTypeUtilisateur($mailU,$idTU) {
    try {
        $cnx = connexionPDO();
        
        $mdpUCrypt = crypt($mdpU, "sel");
        $req = $cnx->prepare("UPDATE Utilisateur SET idTU=:idTU");
        $req->bindValue(':idTU', $idTU, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

/** ---------------------------------------------------------------------------------------- **/
/** Fait le 15/11/2019 **/

function ModifyAdresseByMailU($mailU, $cpU, $rueAdrU, $numAdrU, $villeU) {
    try {
        $cnx = connexionPDO();
        
        $req = $cnx->prepare("UPDATE Utilisateur SET cpU = :cpU, rueAdrU = :rueAdrU, numAdrU = :numAdrU, villeU = :villeU WHERE mailU = :mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->bindValue(':cpU', $cpU, PDO::PARAM_STR);
        $req->bindValue(':rueAdrU', $rueAdrU, PDO::PARAM_STR);
        $req->bindValue(':numAdrU', $numAdrU, PDO::PARAM_STR);
        $req->bindValue(':villeU', $villeU, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function ModifyNomByMailU($mailU, $nomU){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("UPDATE Utilisateur SET nomU=:nomU WHERE mailU=:mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->bindValue(':nomU', $nomU, PDO::PARAM_STR);
        $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function ModifyPrenomByMailU($mailU, $prenomU){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("UPDATE Utilisateur SET prenomU=:prenomU WHERE mailU=:mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->bindValue(':prenomU', $prenomU, PDO::PARAM_STR);
        $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function deleteUtilisateurByMail($mailU){
    
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE from Utilisateur WHERE Utilisateur.mailU = :mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->execute();
        
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
/**
* ----------------------------------------------------------------------------------------
* Admin */

function getUtilisateursByPrenomU($prenomU){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Utilisateur where prenomU like :prenomU");
        $req->bindValue(':prenomU', "%".$prenomU."%", PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUtilisateursByNomU($nomU){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Utilisateur where nomU like :nomU");
        $req->bindValue(':nomU', "%".$nomU."%", PDO::PARAM_STR);
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

    echo "getUtilisateurs() : \n";
    print_r(getUtilisateurs());

    echo "getUtilisateursByPrenomU('ra') : \n";
    print_r(getUtilisateursByPrenomU('ra'));
   
}
?>