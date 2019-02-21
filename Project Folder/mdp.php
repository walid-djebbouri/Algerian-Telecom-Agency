<?php
/**
 * Created by PhpStorm.
 * User: Walid Djebbouri
 * Date: 29/04/2018
 * Time: 10:30
 */

require 'sinscrire.php';

    $sinscrire = new sinscrire() ;


    $sinscrire->mot_passe_oublier($_POST['email'] , $_POST['session']) ;

    if($_POST['submit'] == 'Envoyer'){


    }



?>