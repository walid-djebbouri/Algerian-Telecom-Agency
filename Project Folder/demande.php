<?php
session_start();
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

  
      <link rel="stylesheet" href="css/style.css">
    <script  src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="js/sweetalert.css">



  
</head>

<body>

<?php

if(!empty($_SESSION['demande'])){
    if($_SESSION['demande'] == true){

        ?>

        <script> swal("Demande", "demande enregistré", "success"); </script>

        <?php

        $_SESSION['demande'] = false ;


    }

}

?>

<div>
    <a href="index.html" ><img src="images/home1.png"  id="accueil" ></a>
    <a href="deconnecter.php"><img src="images/off.png" id="deco" ></a>


</div>

  <div class="form">
      

      <div >
        <div id="signup" >
          <h1>Une Nouvelle Demande</h1>
          
          <form action="nouvelle_demande.php" method="post" id="forma">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Le Nom<span class="req">*</span>
              </label>
              <input type="text" name="nom"  required>
            </div>
        
            <div class="field-wrap">
              <label>
                Le Prenom<span class="req">*</span>
              </label>
              <input type="text"  name="prenom" required>
            </div>
          </div>

            <div class="top-row">
              <div class="field-wrap">
                <label>
                  La Wilaya<span class="req">*</span>
                </label>
                <input type="text" name="wilaya"  required>
              </div>

              <div class="field-wrap">
                <label>
                  La Daira <span class="req">*</span>
                </label>
                <input type="text" name="daira" required>
              </div>
            </div>

            <div class="top-row">
              <div class="field-wrap">
                <label>
                  La Commune<span class="req">*</span>
                </label>
                <input type="text" name="commune" required>
              </div>

              <div class="field-wrap">
                <label>
                  La Cité<span class="req">*</span>
                </label>
                <input type="text" name="cite" required>
              </div>

            </div>

            <div class="top-row">
              <div class="field-wrap">
                <label>
                  N° Bloc
                </label>
                <input type="number"  name="bloc" id="bloc" disabled/>
              </div>

              <div class="field-wrap">
                <label>
                  N° Porte<span class="req">*</span>
                </label>
                <input type="text" name="porte" required>
              </div>



            </div>

              <div class="field-wrap">
                  <label id="label">
                     &nbsp;&nbsp;&nbsp; Activé le Numéro Du Bloc
                  </label>
                  <input type="checkbox" name="chck" value="yes" id="ok" />
              </div>

            <div class="field-wrap">
              <label>
                Numéro De Téléphone<span class="req">*</span>
              </label>
              <input type="number" name="tel" required >
            </div>

              <input type="submit" name="demande" class="button button-block"  value="Enregistrer La Demande" >
              <input  type="image" src="images/impression.png" id="sub" >
          
          </form>

        </div>
        

        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src="js/walid.js"></script>
  <script  src="js/index.js"></script>
  <script src="js/accueil.js" ></script>
  <script>

      chk = document.getElementById('ok') ;
      chk.addEventListener('click',active)
      int = 0 ;
      function  active() {
          if(int % 2 == 0){
              document.getElementById('bloc').disabled = "" ;
          }
          else {
              document.getElementById('bloc').disabled = "disabled" ;
              document.getElementById('bloc').value = "";
          }
          int++ ;
      }




      imp = document.getElementById('sub');

      imp.addEventListener('click', change ) ;
      imp.addEventListener("mouseover" , image6 );
      imp.addEventListener("mouseout" , image7);

      function change() {

          fo = document.getElementById('forma') ;
          fo.action = "iojg.php";

      }


      function image6() {

          imp.src="images/impression1.png";
          imp.style.top= "85px";
      }

      function image7() {

          imp.src="images/impression.png" ;
          imp.style.top = "79px" ;

      }







  </script>

</body>
</html>
