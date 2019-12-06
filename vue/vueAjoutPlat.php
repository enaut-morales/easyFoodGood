<form action="./?action=ajoutPlat&idR=<?=$idR?>" method="POST">
    <?=$idR ?>
    Ajout plat <br/><br/>
    <input type="text" name="nomP" placeholder="Nom du plat"><br/><br/>

    Type plat :<br/>
    <select name="idTP">
        <?php
        for ($i = 0; $i < count($lesTypesDePlats); $i++) {
            ?>
        <option value="<?=$lesTypesDePlats[$i]["idTP"] ?>"> <?= $lesTypesDePlats[$i]["libelleTP"] ?></option><br/><br/>

            <?php
        }
        ?>
    </select>
    <br/><br/>
    <input type="text" name="prixFournisseurP" placeholder="Prix du Fournisseur"><br/><br/>
    <input type="text" name="prixClientP" placeholder="Prix pour le client"><br/><br/>
    <input type="file" name="photoP" placeholder="Ajouter une photo"><br/><br/>
    <TEXTAREA name="descriptionP" rows=4 cols=40 placeholder="Description du plat"></TEXTAREA><br/><br/>

    Voulez-vous afficher ce plat pour les clients tout de suite ?<br/>
    <input type="radio" name="platVisible" value="1">Oui
    <input type="radio" name="platVisible" value="0">Non<br/><br/><br/>
    <input type="submit" value="Enregistrer">
</form>