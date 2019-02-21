<?php
session_start();
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


    <link rel="stylesheet" href="css/consultation_css.css">
    <script  src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="js/sweetalert.css">


</head>

<body>

<?php

if(!empty($_SESSION['update'])){
    if($_SESSION['update'] == true){

        ?>

        <script> swal("Modification", "modification réussite", "success"); </script>

        <?php

        $_SESSION['update'] = false ;

    }

}


if(!empty($_SESSION['supprimer'])){
    if($_SESSION['supprimer'] == true){

        ?>

        <script> swal("Suppression", "suppression réussite", "success"); </script>

        <?php

        $_SESSION['supprimer'] = false ;

    }

}

?>



<div class="form">

    <div >

        <ul class="tab-group">
            <li class="active"><a href="inscreption.php" >Inscrir</a></li>
            <li><a href="deconnecter.php" >Deconecter</a></li>

        </ul>
        <div>
            <h1> <?php echo $_GET['session']  ?></h1>

            <form action="" method="post">

                <div >

                    <table >
                        <tr>
                            <th>Le Nom</th>
                            <th>Le Prenom</th>
                            <th>E mail</th>
                            <th>supprimer</th>
                            <th>modifier</th>
                        </tr>
                        <?php
                                require "connexion.php" ;
                                $impair = 1 ;
                                $connexion = new connexion();
                                $bdd = $connexion->data_base_connect();
                                $req = $bdd->prepare('select * from '.$_GET['session']) ;
                                $req->execute();
                                while ($donner = $req->fetch()){

                                    if($impair % 2 == 1 ) {
                                        $impaire = 'impair' ;
                                    }
                                    else{
                                        $impaire = '' ;
                                    }
                                    $impair++ ;
                                    ?>



                        <tr class="<?php echo $impaire ?>">
                            <td ><?php echo $donner['nom'] ?></td>
                            <td ><?php echo $donner['prenom'] ?></td>
                            <td ><?php echo $donner['email'] ?></td>

                            <td><a href="supprimer.php?id=<?php echo $donner['id'] ?>&amp;session=<?php echo $_GET['session']  ?>" >supprimer</a></td>
                            <td><a href="modifier.php?id=<?php echo $donner['id'] ?>&amp;session=<?php echo $_GET['session']  ?>">modifier</a></td>
                        </tr>


                                    <?php
                                }
                        ?>

                </div>








                

            </form>

        </div>



    </div><!-- tab-content -->

</div> <!-- /form -->
<script src="js/walid.js"></script>
<script  src="js/index.js"></script>

</body>
</html>

