<?php
/**
 * Created by PhpStorm.
 * User: Walid Djebbouri
 * Date: 13/03/2018
 * Time: 13:01
 */
 include "sinscrire.php" ;
 $sinscrire = new sinscrire() ;
if(isset($_POST['compte'])){
    $_SESSION['inscription']  = 'caaa' ;
     if(!$sinscrire->verification($_POST['sessione'] , $_POST['email'])){
         $sinscrire->inscrir($_POST['nom'],$_POST['prenom'],$_POST['poste_occuper'],$_POST['nss'],$_POST['email'],$_POST['mot_passe'], $_POST['sessione']) ;
         $_SESSION['inscription'] = 'saaa' ;
         header("location: inscreption.php");
     }
     else{


         header("location: inscreption.php");

     }
 }
?>