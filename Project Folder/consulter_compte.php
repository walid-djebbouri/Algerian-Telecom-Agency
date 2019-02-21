<?php
/**
 * Created by PhpStorm.
 * User: Walid Djebbouri
 * Date: 18/03/2018
 * Time: 11:49
 */
    require "connexion.php" ;
    $connexion = new connexion();
    $bdd = $connexion->data_base_connect();


   //echo $donner['id'].' Le Nom '.$donner['nom'].' Le Prenom '.$donner['prenom'].' E-Mail '.$donner['email'].' Mot De Passe '.$donner['mot_passe'].'<br>';

    $req = $bdd->prepare('select * from administrateur') ;
    $req->execute();
    while ($donner = $req->fetch()){ ?>


        <!DOCTYPE html>
        <html lang="en" >
        <head>
            <meta charset="UTF-8">
            <title>Sign-Up/Login Form</title>
            <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


            <link rel="stylesheet" href="css/style.css">


        </head>

        <body>
        <div class="form1">
            <h1>Choisir Le Type De La Session</h1>
            <ul class="tab-grou" >
                <li class="active"><a href="administrateur.php">Administarateur</a></li>
                <li class="active" id="mélieu" ><a href="client.php">Service Client</a></li>
                <li class="active"> <a href="technique.php">Service Téchnique</a></li>


            </ul>





        </div>
        <script src="js/walid.js"></script>
        <script  src="js/index.js"></script>

        </body>
        </html>


        <?php
    }
?>