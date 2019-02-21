<?php
/**
 * Created by PhpStorm.
 * User: Walid Djebbouri
 * Date: 21/03/2018
 * Time: 00:44
 */
require 'vendor/autoload.php';
include 'sinscrire.php';
if(empty($_SESSION['session'] )){
    header("location: client.php");
}
if(isset($_SESSION['session']) ){
    if( $_SESSION['session'] == 'technique' )  {
        header("location: client.php");
    }

}
    $sinscrire = new sinscrire();
    if($_POST['demande']){

            $sinscrire->nv_demande($_POST['nom'],$_POST['prenom'],$_POST['wilaya'],$_POST['daira'],$_POST['commune'],$_POST['cite'],$_POST['bloc'],$_POST['porte'],$_POST['tel']);
            $sinscrire->inser_demande();
            $_SESSION['demande'] = true ;
            header("location: demande.php");
    }




?>