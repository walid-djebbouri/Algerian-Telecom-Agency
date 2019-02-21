<?php
/**
 * Created by PhpStorm.
 * User: Walid Djebbouri
 * Date: 22/04/2018
 * Time: 11:48
 */

require 'sinscrire.php' ;
if(isset($_SESSION['session'])){

    if( $_SESSION['session'] != 'administrateur' ) {
        header("location: adminstrateur.php");
    }

}

$sinscrire = new sinscrire();
$req = $sinscrire->afficher_projet() ;
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login Form</title>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/zone.css">


</head>

<body>
<a href="inscreption.php"><img id="retour" src="images/retour.png"></a>
<a href="index.html" ><img src="images/home1.png"  id="accueil" ></a>
<a href="deconnecter.php"><img src="images/off.png" id="deco" ></a>
<div class="form">
    <div >
        <div id="login-client">
            <h1>Des Nouveaux Zones</h1>
            <form action="lue.php" method="post">




                <?php
                while ($donne = $req->fetch()){

                    ?>

                    <div class="zone">
                        <input  id="2<?php echo $donne['id']?>" type="text"  disabled value=<?php echo $donne['nom'] ?>  >
                        <input class="checkbox" type="checkbox" name="vue[]" id="<?php echo $donne['id']?>" value="<?php echo $donne['id']?>" >
                        <label id="1<?php echo $donne['id']?>">Marquer Comme Vue</label>

                    </div>

                    <?php

                }

                ?>

                <input type="hidden" name="type" value="projet" >
                <input type="submit" class="button button-block"  value="Enregistrer" disabled id="submit" />
            </form>
        </div>
    </div><!-- tab-content -->
</div> <!-- /form -->

<script>


    /********************************************************/

    check = document.getElementsByClassName('checkbox');

    for(i = 0 ; i < check.length ; i++){

        check[i].addEventListener("mouseover" , check1);
        check[i].addEventListener("mouseout" , check2);
        check[i].addEventListener("click" , vue);

    }

    function vue(event) {

        c = event.target.id ;
        label = document.getElementById(1+c);
        label.style.display="inline";
        label.style.color="green";
        button = document.getElementById('submit');
        button.disabled="";
    }


    function check1(event) {

        c = event.target.id ;
        label = document.getElementById(1+c);
        label.style.color="red";
        label.style.display="inline";


    }

    function check2(event) {

        c = event.target.id ;
        label = document.getElementById(1+c);
        label.style.display="none";

    }

    /************************************************************/

    retour = document.getElementById('retour');
    retour.addEventListener("mouseover" , ret);
    retour.addEventListener("mouseout" , ret1);

    function ret() {

        retour.src="images/retour2.png";
        retour.style.top="85px";

    }

    function ret1() {

        retour.src="images/retour.png";
        retour.style.top="79px";
    }

    accueil = document.getElementById('accueil') ;
    accueil.addEventListener('mouseover' ,image ) ;
    accueil.addEventListener("mouseout" ,image1 ) ;

    function image( ) {

        accueil.src="images/home2.png";
        accueil.style.top= "85px";
    }

    function image1() {

        accueil.src="images/home1.png" ;
        accueil.style.top = "79px" ;

    }




    deco = document.getElementById('deco') ;
    deco.addEventListener('mouseover' ,image2 ) ;
    deco.addEventListener("mouseout" ,image3 ) ;


    function image2() {

        deco.src="images/off2.png";
        deco.style.top= "85px";

    }

    function image3() {

        deco.src="images/off.png" ;
        deco.style.top = "79px" ;

    }





</script>




</body>
</html>

