<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        idR de votre restaurant (Test): <?= $idR?>
        <br/>
        Nom du restaurant: <?= $nomR ?>
        <br/>
        Ville: <?= $villeR?>
        <br/>
        <br/>
        
        <?php echo "<a href='./?action=ajoutPlat&idR=" . $idR . "'>" . "Ajouter un plat" . "</a>"; ?>
    </body>
</html>
