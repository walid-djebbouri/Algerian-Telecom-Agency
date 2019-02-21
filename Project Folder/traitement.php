<?php
/**
 * Created by PhpStorm.
 * User: Walid Djebbouri
 * Date: 29/03/2018
 * Time: 23:16
 */
?>
<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Algérie Télécome</title>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


    <link rel="stylesheet" href="css/traitement.css">


</head>

<body>

    <a href="index.html" ><img src="images/home1.png"  id="accueil" ></a>
    <a href="deconnecter.php"><img src="images/off.png" id="deco" ></a>
    <a href="traville.php"><img src="images/retour.png" id="trv" ></a>


<div class="form">

    <ul class="tab-group">
        <li class="tab active"><a href="#signup">Zone Non Couverte</a></li>
        <li class="tab"><a href="#login1">Projet En Cours</a></li>
        <li class="tab"><a href="#login2">Traitement</a></li>
    </ul>

    <div class="tab-content">
        <div id="signup">
            <h1>Zone Non Couverte</h1>

            <form action="traiter.php" method="post">

                <div class="field-wrap">
                    <label>
                        Le Nom De La Zone<span class="req">*</span>
                    </label>
                    <input type="text" name="zone" required >
                </div>

                <input type="hidden" name="traitement"  value="zone" >
                <input type="hidden" name="id" value=<?php echo $_POST['id']?> >

                <button type="submit" class="button button-block"/>Enregistrer</button>

            </form>

        </div>

        <div id="login1">
            <h1>Projet En Cours</h1>

            <form action="traiter.php" method="post">

                <div class="field-wrap">
                    <label>
                        Le Nom Du Projet<span class="req">*</span>
                    </label>
                    <input type="text" name="projet" required />
                </div>

                <div class="field-wrap">
                    <label>
                        La Date De Fin<span class="req">*</span>
                    </label>
                    <input type="date" name="date" required />
                </div>

                <input type="hidden" name="traitement"  value="projet" >
                <input type="hidden" name="id" value=<?php echo $_POST['id']?> >

                <button class="button button-block"/>Enregistrer</button>

            </form>

        </div>

        <div id="login2">
            <h1>Traitement</h1>

            <form action="traiter.php" method="post">

                <div class="radiobutton">
                    <div ><p>Choisir L Etat</p><br>
                        <div class="radio"><input   type="radio" name="etat" value="sature" id="sature" required><p>&nbsp;Sature</p></div>
                        <div class="radio"><input   type="radio" name="etat" value="non-sature" id="nosature" required><p>&nbsp;Non Sature</p></div>
                        <div class="radio"><input   type="radio" name="etat" value="eloigne" id="eloigne" required><p>&nbsp;Eloigne</p></div>
                    </div>
                </div>


                <div class="field-wrap">
                    <label>
                        La Distance
                    </label>
                    <input type="number" name="distance" id="distance"   disabled  />
                </div>

                <div class="field-wrap">
                    <label>
                        N° De Référence<span class="req">*</span>
                    </label>
                    <input type="number" name="reférence" required />
                </div>

                <input type="hidden" name="traitement" value="realisable" >
                <input type="hidden" name="id" value=<?php echo $_POST['id']?> >

                <button class="button button-block"/>Enregistrer</button>

            </form>

        </div>

    </div><!-- tab-content -->

</div> <!-- /form -->

<script src="js/walid.js"></script>
<script  src="js/index.js"></script>
<script  src="js/accueil.js" ></script>

<script>
    eloigne = document.getElementById('eloigne');

    eloigne.addEventListener('click' , distance);

    function distance() {

        document.getElementById('distance').disabled = "" ;
    }

    sature = document.getElementById('sature');

    sature.addEventListener('click' , distance1);


    nosature = document.getElementById('nosature');

    nosature.addEventListener('click' , distance1);


    function distance1() {

        document.getElementById('distance').disabled = "disabled" ;
        document.getElementById('distance').value = "" ;

    }




    travail = document.getElementById('trv') ;
    travail.addEventListener("mouseover" , image16);
    travail.addEventListener("mouseout" , image17) ;



    function image16() {

        travail.src="images/retour2.png";
        travail.style.top= "85px";

    }

    function image17() {

        travail.src="images/retour.png" ;
        travail.style.top = "79px" ;

    }

</script>




</body>

</html>

