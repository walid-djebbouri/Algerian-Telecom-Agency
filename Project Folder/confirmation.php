<?php
/**
 * Created by PhpStorm.
 * User: Walid Djebbouri
 * Date: 29/04/2018
 * Time: 13:41
 */

require 'sinscrire.php' ;

$sinscrire = new sinscrire();

if( $_POST['submit'] == 'Modifier' ) {


    $sinscrire->modifier_mot_de_passe($_POST['mot_passe1'], $_POST['confirmation']);


}

?>