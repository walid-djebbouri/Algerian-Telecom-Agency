<?php
session_start();
include 'connexion.php';

if(empty($_SESSION['session'] )){
    header("location: administrateur.php");
}
if(isset($_SESSION['session']) ){
    if( $_SESSION['session'] != 'administrateur' )  {
        header("location: administrateur.php");
    }

}


$connexion = new connexion();
$bdd = $connexion->data_base_connect();
$req = $bdd->prepare('select * from '.$_GET['session'].'  where id = ?');
$req->execute(array($_GET['id']));
$donne = $req->fetch() ;
?>

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

<a href="index.html" ><img src="images/home1.png"  id="accueil" ></a>
<div class="form">
    <div >

        <ul class="tab-group">
            <li class="active"><a href="consultation.php?session=<?php echo $_GET['session']?>"  >Consulter</a></li>
            <li ><a href="deconnecter.php" >Deconecter</a></li>

        </ul>
        <div id="signup">
            <h1>Modifier Un Compte</h1>

            <form action="update.php" method="post">

                <div class="top-row">
                    <div class="field-wrap">
                        <input type="text" name="nom"  value=<?php echo $donne['nom'] ?>  />
                        <label>
                            Le Nom
                        </label>
                    </div>


                    <div class="field-wrap">
                        <input type="text" name="prenom" value=<?php echo $donne['prenom'] ?>  />
                        <label>
                            Le Prenom
                        </label>
                    </div>

                </div>

                <div class="field-wrap">
                    <input type="text"  name="poste_occuper" value=<?php echo $donne['poste_occuper'] ?>  />
                    <label>
                        Le Poste Occuper
                    </label>
                </div>


                <div class="field-wrap">

                    <input type="number" name="nss"  value=<?php echo $donne['nss'] ?>   />
                    <label>
                        N° Securité Sociale
                    </label>

                </div>

                <div class="field-wrap">
                    <input type="email" name="email" value=<?php echo $donne['email'] ?>  />
                    <label>
                        E Mail
                    </label>
                </div>




                <input type="hidden" name="session" value=<?php echo $_GET['session'] ?> >
                <input type="hidden" name="id" value=<?php echo $_GET['id'] ?> >


                <input type="submit" name="modifier" class="button button-block"  value="Modifier" />

            </form>

        </div>



    </div><!-- tab-content -->

</div> <!-- /form -->
<script src="js/walid.js"></script>
<script  src="js/index.js"></script>
<script src="js/accueil.js" ></script>

</body>
</html>
