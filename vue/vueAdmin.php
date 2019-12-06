
<h1>Liste des utilisateurs</h1>

<form action="./?action=rechercheUtil" method="POST">
    
    <input type="text" name="recherche" placeholder="Rechercher un utlilisateur" />
    <input type="submit">
    
</form>

<?php
for ($i = 0; $i < count($utilisateurs); $i++) {
    
    if($utilisateurs[$i]["mailU"] != $mailU){
?>

        </div>
        <div class="descrCard"><?php echo "<a href='./?action=detailUtil&mailU=" . $utilisateurs[$i]['mailU'] . "'>" . $utilisateurs[$i]['prenomU'] ." ".$utilisateurs[$i]['nomU']. "</a>"; ?>
            <br />
            
        </div>
        <div class="tagCard">
            <ul id="tagFood">		


            </ul>


        </div>

    </div>





    <?php
}
}
?>