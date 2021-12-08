<html lang="fr">
<met charset="UTF-8"/>

    <head><title>Erreur</title>
    <link rel="stylesheet" type="text/css" href="<?= $base_url . 'Vues/style.css'?>" media="screen"/>

    </head>

    <body>

        <h1>ERREUR !!!!!</h1>
        <?php
            if (isset($dVueEreur)) {
                foreach ($dVueEreur as $value){
                    echo $value;
                }
            }
        ?>



    </body>
</html>