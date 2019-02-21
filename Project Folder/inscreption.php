<?php
require 'sinscrire.php';
if(empty($_SESSION['session'] )){
    header("location: administrateur.php");
}
if(isset($_SESSION['session']) ){
		if( $_SESSION['session'] != 'administrateur' )  {
         header("location: administrateur.php");
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
    if(!empty($_SESSION['inscription'])){

        if($_SESSION['inscription'] == 'saaa') {
            ?>
            <script> swal("Inscription", "inscription réussite", "success"); </script>
        <?php
            $_SESSION['inscription'] ="";
        }
    if ($_SESSION['inscription'] == 'caaa'){
        ?>
            <script> swal("Erreur", "ce email est deja utilisé", "error"); </script>
            <?php
            $_SESSION['inscription'] ="";

        }






}

    $zone = new sinscrire();
    if($zone->reseaux()){
        ?>

            <a href="zone.php"><img src="images/reseau.png"  id="reseau" ></a>

        <?php
    }

    if($zone->projet_terminer()){
        ?>

        <a href="projet.php"><img src="images/note.png"  id="note" > </a>

        <?php
    }




?>
<div>
    <a href="index.html" ><img src="images/home1.png"  id="accueil" ></a>
    <a href="deconnecter.php"><img src="images/off.png" id="deco" ></a>


</div>


<div class="form">

    <div >

          <ul class="tab-group">
              <li class="tab active"><a href="#signup">Inscrire</a></li>
              <li class="tab"><a href="#consultation" >Consulter</a></li>

          </ul>



          <div class="tab-content">
        <div id="signup">
          <h1>Créer Un Nouveau Compte</h1>

          <form action="inscre.php" method="post">

          <div class="top-row">
            <div class="field-wrap">
              <label>
                Le Nom<span class="req">*</span>
              </label>
              <input type="text" name="nom" required autocomplete  />
            </div>

            <div class="field-wrap">
              <label>
                Le Prenom<span class="req">*</span>
              </label>
              <input type="text" name="prenom" required autocomplete/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Poste Occuper<span class="req">*</span>
            </label>
            <input type="text"  name="poste_occuper" required autocomplete/>
          </div>

          <div class="field-wrap">
            <label>
              N° De Sécurité Sociale<span class="req">*</span>
            </label>
            <input type="number" name="nss" required autocomplete/>
          </div>

            <div class="field-wrap">
              <label>
                Nom D'utilisateur<span class="req">*</span>
              </label>
              <input type="text" name="email" required autocomplete/>
            </div>

            <div class="field-wrap">
              <label>
                Mot De Passe<span class="req">*</span>
              </label>
              <input type="password" name="mot_passe" required id="mot_passe" >

                <p id="force"></p>
            </div>

              <div class="radiobutton">
                  <div ><p>Choisir L Etat</p><br>
                      <div class="radio"><input   type="radio" name="sessione" value="administrateur"  required><p>Administrateur</p></div>
                      <div class="radio"><input   type="radio" name="sessione" value="commerciale"  required><p>Commerciale</p></div>
                      <div class="radio"><input   type="radio" name="sessione" value="technique"  required><p>Téchnique</p></div>
                  </div>
              </div>


              <input type="submit" name="compte" class="button button-block"  value="Créer Un Compte" />

			</form>

        </div>
              <div id="consultation">


            <form action="/" method="post">


                <div class="form">
                    <h1>Choisir Le Type De La Session</h1>
                    <ul class="tab-grou" >
                        <li class="active"><a href="consultation.php?session=administrateur">Administarateur</a></li>
                        <li class="active" id="mélieu" ><a href="consultation.php?session=commerciale">Service Client</a></li>
                        <li class="active"> <a href="consultation.php?session=technique">Service Téchnique</a></li>
                    </ul>
                </div>
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
