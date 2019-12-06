<?php

include_once "bd.inc.php";

function getNbPlatsByIdC($idC) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select nbPlats from Tarrifer where idC=:idC");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addNbPlatsByIdC($idC) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("insert into Tarifer (idTP, idP, idC, nbPlats) VALUES (:idTP, :idP,:idC, nbPlats");
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

function deleteTariferByIdC($idC){
    
    try{
       $cnx = connexionPDO(); 
       
       $req = $cnx->prepare("DELETE FROM Tarifer WHERE idC = :idC");
       $req->bindValue(':idC', $idC, PDO::PARAM_INT);
       $req->execute();

        
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
}


if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    //header('Content-Type:text/plain');

    echo "getUtilisateurs() : \n";
    print_r(getUtilisateurs());

   
}
?>