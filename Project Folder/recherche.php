<?php
/**
 * Created by PhpStorm.
 * User: Walid Djebbouri
 * Date: 03/05/2018
 * Time: 10:49
 */

require 'sinscrire.php';
if(empty($_SESSION['session'] )){
    header("location: client.php");
}
if(isset($_SESSION['session']) ){
    if( $_SESSION['session'] == 'technique'   )  {
        header("location: client.php");
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


    <link rel="stylesheet" href="css/inscreption.css">
    <script  src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="js/sweetalert.css">



</head>

<body>
<?php
    if(!empty($_SESSION['traitement'])){

        ?>
            <script>

                swal("Demande", "<?php echo $_SESSION['traitement']   ?> " , "<?php echo $_SESSION['sucsse']  ?>"); </script>
        <?php

        $_SESSION['traitement'] ="";
        $_SESSION['sucsse']="" ;

    }
?>

<div>
    <a href="index.html" ><img src="images/home1.png"  id="accueil" ></a>
    <a href="deconnecter.php"><img src="images/off.png" id="deco" ></a>


</div>


<div class="form">

    <div >

        <ul class="tab-group">
            <li class="tab active"><a href="#signup">Recherche Par Id</a></li>
            <li class="tab"><a href="#consultation" >Recherche Par Nom</a></li>

        </ul>



        <div class="tab-content">
            <div id="signup">
                <h1>Entrer ID De La Demande</h1>

                <form action="recherch.php" method="post">


                    <div class="field-wrap">
                        <label>
                            L'ID De La Demande<span class="req">*</span>
                        </label>
                        <input type="number"  name="idDemande" required autocomplete/>
                    </div>

                    <input type="hidden" name="type" value="parId" >



                    <input type="submit" name="compte" class="button button-block"  value="Chercher" />

                </form>

            </div>
            <div id="consultation">


                <h1>Entrer Le Nom Et Le Prenom</h1>

                <form action="recherch.php" method="post">


                    <div class="field-wrap">
                        <label>
                            Le Nom Du Client<span class="req">*</span>
                        </label>
                        <input type="text"  name="nom" required autocomplete/>
                    </div>


                    <div class="field-wrap">
                        <label>
                            Prenom Du Client<span class="req">*</span>
                        </label>
                        <input type="text"  name="prenom" required autocomplete/>
                    </div>

                    <input type="hidden" name="type" value="parNom" >



                    <input type="submit" name="compte" class="button button-block"  value="Chercher" />

                </form>

            </div>




        </div><!-- tab-content -->
    </div> <!-- /form -->




    <script src="js/walid.js"></script>
    <script  src="js/index.js"></script>
    <script src="js/accueil.js" ></script>

    <script>

        mot_de_passe = document.getElementById('mot_passe') ;
        mot_de_passe.addEventListener('blur' , verifier)

        function verifier() {
            laforce = document.getElementById('force') ;

            if( mot_de_passe.value.length <6){
                laforce.innerHTML='Attention ! <br>  La Longeur Du Mot De Passe Doit Etres Superieure a 6 Charactere ';
                laforce.style.color= 'red';
                laforce.style.fontSize='18px'
                laforce.style.transform = 'translateY(10px)';

            }
            if( 5< mot_de_passe.value.length && mot_de_passe.value.length < 10 ) {
                laforce.textContent='mot de passe est moyen';
                laforce.style.color= 'yellow';
                laforce.style.fontSize='18px'
                laforce.style.transform = 'translateY(10px)';
            }
            if( 9 < mot_de_passe.value.length ){
                laforce.textContent='Mot De Passe Est Trés Fort';
                laforce.style.color= 'green';
                laforce.style.fontSize='18px'
                laforce.style.transform = 'translateY(10px)';
            }



        }


    </script>











</body>
</html>
