<?php
/**
 * Created by PhpStorm.
 * User: Walid Djebbouri
 * Date: 21/04/2018
 * Time: 12:50
 */
    require 'sinscrire.php';
    $sinscrire = new sinscrire();

    if(isset($_POST["vue"])){



        foreach( $_POST['vue'] as $valeur)
        {
            $sinscrire->marquer_lue($valeur , $_POST['type']);

        }

    }
header("location: inscreption.php");



?>