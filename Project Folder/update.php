<?php
/**
 * Created by PhpStorm.
 * User: Walid Djebbouri
 * Date: 22/03/2018
 * Time: 04:56
 */

include "sinscrire.php" ;
$sinscrire = new sinscrire() ;
if(isset($_POST['modifier'])){

        $sinscrire->update( $_POST['id'] , $_POST['nom'],$_POST['prenom'],$_POST['poste_occuper'],$_POST['nss'],$_POST['email'],$_POST['mot_passe'], $_POST['session']) ;
        $_SESSION['update'] = true ;
        header("location: consultation.php?session=".$_POST['session']) ;

}

?>