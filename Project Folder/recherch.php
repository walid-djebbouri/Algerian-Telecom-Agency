<?php
/**
 * Created by PhpStorm.
 * User: Walid Djebbouri
 * Date: 03/05/2018
 * Time: 11:21
 */
require "sinscrire.php";

$sinscrire = new sinscrire();
if( $_POST["type"] == "parId" ){

    $sinscrire->rechercher_par_id($_POST['idDemande']) ;
}
if ($_POST["type"] == "parNom"){

    $sinscrire->recherche_par_nom($_POST['nom']  , $_POST['prenom']) ;


}

?>