<?php
/**
 * Created by PhpStorm.
 * User: Walid Djebbouri
 * Date: 30/03/2018
 * Time: 18:57
 */

    include 'sinscrire.php';

    $sinsscire  = new sinscrire();


    if($_POST['traitement'] == 'zone' ){

        $sinsscire->zone($_POST['id'] , $_POST['zone']);
        $_SESSION['tri'] = true ;

    }

    if($_POST['traitement'] == 'projet'){

        $sinsscire->projet($_POST['id'] , $_POST['projet'] , $_POST['date']) ;
        $_SESSION['tri'] = true ;
    }

    if( $_POST['traitement'] == 'realisable' ){

        if(empty($_POST['distance'])) $_POST['distance'] = 0 ;
        $sinsscire->boitier($_POST['id'],$_POST['reférence'],$_POST['etat'],$_POST['distance']) ;
        $_SESSION['tri'] = true ;


    }

    header("location: traville.php");

?>