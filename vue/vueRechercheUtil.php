<?php


for ($i = 0; $i < count($result); $i++) {
    
    
?>

        </div>
        <div class="descrCard"><?php echo "<a href='./?action=detailUtil&mailU=" . $result[$i]['mailU'] . "'>" . $result[$i]['prenomU'] ." ".$result[$i]['nomU']. "</a>"; ?>
            <br />
            
        </div>
        <div class="tagCard">
            <ul id="tagFood">		


            </ul>


        </div>

    </div>





    <?php
}
?>

<form action="./?action=rechercheUtil" method="POST">
    
    <input type="text" name="recherche" placeholder="Rechercher un utlilisateur" />
    <input type="submit">
    
</form>
<br/>
<br/>
<br/>
<a href="./?action=monProfil">retour sur le profil</a>