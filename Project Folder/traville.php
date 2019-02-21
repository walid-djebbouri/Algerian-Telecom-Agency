<?php
session_start();
if(empty($_SESSION['session'] )){
    header("location: technique.php");
}
if(isset($_SESSION['session']) ){
    if( $_SESSION['session'] != 'technique' )  {
        header("location: technique.php");
    }

}
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

<div>
    <a href="index.html" ><img src="images/home1.png"  id="accueil" ></a>
    <a href="deconnecter.php"><img src="images/off.png" id="deco" ></a>
    <a href="impression.php" target="_blank" ><img src="images/impression.png"  id="impression" ></a>


</div>

<?php
include "connexion.php" ;
 if( !empty($_SESSION['tri']) ){

     if($_SESSION['tri'] == true){


         ?>

         <script> swal("Traitement", "traitement términé avec succes", "success"); </script>

         <?php

         $_SESSION['tri'] = false ;

     }
 }


    $connexion  = new connexion();
    $bdd = $connexion->data_base_connect();
    $req = $bdd->query("select client.*  from client inner join (( select id from demande where traiter = false ) as de  ) on client.id = de.id ");

    if( ($req->fetch() == false ) ){


        include 'message.php' ;



    }




    while ($donne = $req->fetch()){

        ?>
        <div class="form">

            <div >
                <div id="signup" >
                    <h1>Demande Non Traiter</h1>

                    <form action="traitement.php" method="post">
                        <div class="top-row">
                            <div class="field-wrap">
                                <input type="text" name="nom" value=<?php  echo $donne['nom'] ?> disabled  />
                                <label>
                                    Le Nom
                                </label>
                            </div>

                            <div class="field-wrap">
                                <input type="text"  name="prenom" value=<?php  echo $donne['prenom'] ?> disabled />
                                <label>
                                    Le Prenom
                                </label>
                            </div>
                        </div>

                        <div class="top-row">
                            <div class="field-wrap">
                                <input type="text" name="wilaya" value=<?php  echo $donne['wilaya'] ?> disabled />
                                <label>
                                    La Wilaya
                                </label>
                            </div>

                            <div class="field-wrap">
                                <input type="text" name="daira" value=<?php  echo $donne['daira'] ?> disabled />
                                <label>
                                    La Daira
                                </label>
                            </div>
                        </div>

                        <div class="top-row">
                            <div class="field-wrap">
                                <input type="text" name="commune" value=<?php  echo $donne['commune'] ?> disabled />
                                <label>
                                    La Commune
                                </label>
                            </div>

                            <div class="field-wrap">
                                <input type="text" name="cite" value=<?php  echo $donne['cité'] ?> disabled />
                                <label>
                                    La Cité
                                </label>
                            </div>

                        </div>

                        <div class="top-row">
                            <div class="field-wrap">
                                <input type="text"  name="bloc" value=<?php  echo $donne['bloc'] ?> disabled />
                                <label>
                                    N° Bloc
                                </label>
                            </div>

                            <div class="field-wrap">
                                <input type="text" name="porte" value=<?php  echo $donne['porte'] ?> disabled />
                                <label>
                                    N° Porte
                                </label>
                            </div>



                        </div>


                        <div class="field-wrap">
                            <input type="number" name="tel" value=<?php  echo $donne['telephone'] ?> disabled />
                            <label>
                                Numéro De Téléphone
                            </label>
                        </div>

                        <input type="hidden" name="id" value=<?php echo $donne['id']?> >

                        <input type="submit" name="triter" class="button button-block"  value="Traiter Cette Demande" />


                    </form>

                </div>



            </div><!-- tab-content -->

        </div> <!-- /form -->
        <script src="js/walid.js"></script>
        <script  src="js/index.js"></script>




        <?php




    }

    $req->closeCursor();

?>

<script src="js/accueil.js" ></script>
</body>
</html>

