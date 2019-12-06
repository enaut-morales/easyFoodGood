<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h1><?= $prenomU." ".$nomU?></h1>
        
        critiques de <?= $prenomU ?> : 
        <br/>
        <?php
            print_r($critiques);
            echo'<br/>';
            print_r($restos);
        ?>

    </body>
</html>
