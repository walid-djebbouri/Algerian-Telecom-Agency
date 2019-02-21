
<?php
/**
 * Created by PhpStorm.
 * User: Walid Djebbouri
 * Date: 25/03/2018
 * Time: 21:05
 */


    include 'sinscrire.php';

    if( isset($_POST['supprimer']) ){

        $supprimer = new sinscrire();

        $supprimer->supprimer( $_POST['id'] , $_POST['session'] ) ;

        $_SESSION['supprimer'] = true ;
        header("location: consultation.php?session=".$_POST['session']) ;

    }


?>