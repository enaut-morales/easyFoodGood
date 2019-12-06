<?php

include_once "bd.inc.php";

function getPlats() {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Plat");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getPlatByIdP($idP) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Plat where idP=:idP");
        $req->bindValue(':idP', $idP, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getPlatByNomP($nomP) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Plat where nomP=:nomP");
        $req->bindValue(':nomP', $nomP, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addPlat($idR, $idTP, $nomP, $prixFournisseurP, $prixClientP, $photoP, $descriptionP, $platVisible) {
    try {
        $cnx = connexionPDO();
        
        $req = $cnx->prepare("insert into Plat (idR, idTP, nomP, prixFournisseurP, prixClientP, photoP, descriptionP, platVisible) "
                . "values(:idR, :idTP, :nomP, :prixFournisseurP, :prixClientP, :photoP, :descriptionP, :platVisible)");
        
        $req->bindValue(':idR', $idR, PDO::PARAM_STR);
        $req->bindValue(':idTP', $idTP, PDO::PARAM_STR);
        $req->bindValue(':nomP', $nomP, PDO::PARAM_STR);
        $req->bindValue(':prixFournisseurP', $prixFournisseurP, PDO::PARAM_INT);
        $req->bindValue(':prixClientP', $prixClientP, PDO::PARAM_INT);
        $req->bindValue(':photoP', $photoP, PDO::PARAM_STR);
        $req->bindValue(':descriptionP', $descriptionP, PDO::PARAM_STR);
        $req->bindValue(':platVisible', $platVisible, PDO::PARAM_BOOL);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function ModifPlat($idP, $idR, $idTP, $nomP, $prixFournisseurP, $prixClientP, $photoP, $descriptionP, $platVisible) {
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("UPDATE Plat SET idP=:idP, idR=:idR, idTP=:idTP, nomP=:nomP, prixFournisseurP=:prixFournisseurP, "
                . "prixClientP=:prixClientP, photoP=:photoP, descriptionP=:descriptionP, platVisible=:platVisible  WHERE idP=:idP");
        
        $req->bindValue(':idP', $idP, PDO::PARAM_INT);
        $req->bindValue(':idR', $idR, PDO::PARAM_STR);
        $req->bindValue(':idTP', $idTP, PDO::PARAM_STR);
        $req->bindValue(':nomP', $nomP, PDO::PARAM_STR);
        $req->bindValue(':prixFournisseurP', $prixFournisseurP, PDO::PARAM_INT);
        $req->bindValue(':prixClientP', $prixClientP, PDO::PARAM_INT);
        $req->bindValue(':photoP', $photoP, PDO::PARAM_STR);
        $req->bindValue(':descriptionP', $descriptionP, PDO::PARAM_STR);
        $req->bindValue(':platVisible', $platVisible, PDO::PARAM_BOOL);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function SupprPlatByIdP($idP) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("Delete from Plat where idP=:idP");
        $req->bindValue(':idP', $idP, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function SupprPlatByNomP($nomP) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("Delete from Plat where nomP=:nomP");
        $req->bindValue(':nomP', $nomP, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

/** ---------------------------------------------------------------------------------------- **/
/** Fait le 29/11/2019 **/

function getPlatByIdR($idR) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Plat where idR=:idR");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
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

   
}
?>

