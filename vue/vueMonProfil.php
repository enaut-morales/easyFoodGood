<?php


?>
Nom : <?=$nom; ?> 
<br/>
Prénom : <?=$prenom; ?>
<br/>
Adresse : <?=$numAdrU." ".$rueAdrU." ".$cpU." ".$villeU; ?>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<a href="./?action=modifierProfil">Modifier mon profaïle</a>
<br/>
<br/>
<a href="./?action=deleteProfil">Supprimer mon profaïle</a>
<br/>
<br/>

<br/>
<br/>

<?php

if($idTU == 3){ ?>
Partie Restaurateur:
<?php
for($i=0; $i<count($restos); $i++){
    
?>
<div class="card">
<div class="descrCard"><?php echo "<a href='./?action=detailResto&idR=" . $restos[$i]['idR'] . "'>" . $restos[$i]['nomR'] . "</a>"; ?>
            <br />
            <?= $restos[$i]["numAdrR"] ?>
            <?= $restos[$i]["rueAdrR"] ?>
            <br />
            <?= $restos[$i]["cpR"] ?>
            <?= $restos[$i]["villeR"] ?><br/>
            Heure d'ouverture: <?= $restos[$i]["heureOuv"] ?><br/>
            Heure de fermeture: <?= $restos[$i]["heureFerm"] ?>
        </div>
    </div>
    <br/>
<?php
}
}
?>