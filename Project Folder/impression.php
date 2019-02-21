<?php
require 'sinscrire.php' ;
require "vendor/autoload.php" ;
if(empty($_SESSION['session'] )){
    header("location: technique.php");
}
if(isset($_SESSION['session']) ){
    if( $_SESSION['session'] != 'technique' )  {
        header("location: technique.php");
    }

}






/**
 * Created by PhpStorm.
 * User: Walid Djebbouri
 * Date: 02/04/2018
 * Time: 19:24
 */




    $connexion = new connexion();
    $bdd = $connexion->data_base_connect();
    $req = $bdd->query("select client.*  from client inner join (( select id from demande where traiter = false ) as de  ) on client.id = de.id ");





    ob_start() ;



    ?>

    <style>

        td , th{
            border: 1pt solid black;
            text-align: center;
            font-size: 20px;
            padding: 1%;
            width: 10%;

        }

        .bloc , .porte{

            width: 6%;
        }
        .tel{

            width: 12%;
        }

        table{
            border-collapse: collapse ;
            margin: auto;
        }

        h1{
            text-align: center;
            margin-top: 20px ;
        }

        h2{
            text-align: center;
            font-size: 20px;
        }



    </style>

    <page>

        <h1> La Lise Des Demandes A traité  </h1>
        <h2> <?php  echo date('d/m/20y') ?> </h2>

        <table>
            <tr>
                <th class="nom" > Le Nom </th>
                <th class="prenom" > Le Prenom </th>
                <th class="tel" >Tel</th>
                <th class="wilaya" >Wilaya</th>
                <th class="daira">Daira</th>
                <th class="commune">Commune</th>
                <th class="cite">Cité</th>
                <th class="bloc">N°Bolc</th>
                <th class="porte">N° Porte</th>
            </tr>

            <?php
             while ($donne = $req->fetch()) {
                 ?>


                 <tr>
                     <td class="nom"><?php echo $donne['nom']?></td>
                     <td class="prenom"><?php echo $donne['prenom']?></td>
                     <td class="tel"><?php echo $donne['telephone']?></td>
                     <td class="wilaya"><?php echo $donne['wilaya']?></td>
                     <td class="daira"><?php echo $donne['daira']?></td>
                     <td class="commune"><?php echo $donne['commune']?></td>
                     <td class="cité"><?php echo $donne['cité']?></td>
                     <td class="bloc"><?php echo $donne['bloc']?></td>
                     <td class="porte"><?php echo $donne['porte']?></td>
                 </tr>

                 <?php
             }
                 ?>
        </table>

    </page>


    <?php




    $contenue = ob_get_clean() ;
    try{

        $pdf = new \Spipu\Html2Pdf\Html2Pdf('L', 'A4', 'fr', true, 'UTF-8', 5);
        $pdf->pdf->SetDisplayMode('fullpage') ;
        $pdf->writeHTML($contenue);
        $pdf->output('demande.pdf');



    }
    catch(Html2PdfException $e){

    }


?>