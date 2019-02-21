<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Walid Djebbouri
 * Date: 29/04/2018
 * Time: 09:17
 */

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script  src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="js/sweetalert.css">



</head>

<body>

<?php

if(!empty($_SESSION['erreur'])){
    if($_SESSION['erreur'] == true){

        ?>

        <script> swal("Erreur", "Ce Compte n'existe pas", "error"); </script>

        <?php

        $_SESSION['erreur'] = false ;


    }

}




?>




<a href="index.html" ><img src="images/home1.png"  id="accueil" ></a>
<div class="form">



    <div >


        <div id="login-client">
            <h1 id="erreur">Changer Le Mot De Passe</h1>

            <form action="mdp.php" method="post">

                <div class="field-wrap">
                    <p>Entrer Votre Adresse Mail SVP</p>
                </div>



                <div class="field-wrap">
                    <label>
                        Nom D'utilisateur<span class="req">*</span>
                    </label>
                    <input type="text" name="email" required autocomplete="on"/>

                </div>

                <input type="hidden" name="session" value="administrateur" >

                <input type="submit" name="submit" class="button button-block"  value="Envoyer" />

            </form>

        </div>

    </div><!-- tab-content -->

</div> <!-- /form -->
<script src="js/walid.js"></script>
<script  src="js/index.js"></script>
<script src="js/accueil.js" ></script>
</body>
</html>

