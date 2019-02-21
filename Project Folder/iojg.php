<?php
require 'sinscrire.php' ;
require "vendor/autoload.php" ;
/**
 * Created by PhpStorm.
 * User: Walid Djebbouri
 * Date: 02/04/2018
 * Time: 19:24
 */
ob_start() ;
$sinscrire = new sinscrire();
if(  empty($_POST['bloc']) ) $_POST['bloc'] = 0 ;
$sinscrire->nv_demande($_POST['nom'],$_POST['prenom'],$_POST['wilaya'],$_POST['daira'],$_POST['commune'],$_POST['cite'],$_POST['bloc'],$_POST['porte'],$_POST['tel']);
$sinscrire->inser_demande();


?>

    <style>

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

        <h1> La republique algériene démocratique et populaire   </h1>
        <h1> Ministre de telecommunication   </h1>
        <h2> <?php  echo date('d/m/20y') ?> </h2>
        <p>le nom <?php echo $_POST['nom'] ?>   le prenom <?php echo $_POST['nom'] ?> </p>
        <p>le  <?php echo $_POST['nom'] ?>   le prenom <?php echo $_POST['nom'] ?> </p>
        <p>le nom <?php echo $_POST['nom'] ?>   le prenom <?php echo $_POST['nom'] ?> </p>
        <p>le nom <?php echo $_POST['nom'] ?>   le prenom <?php echo $_POST['nom'] ?> </p>
        <p>le nom <?php echo $_POST['nom'] ?>   le prenom <?php echo $_POST['nom'] ?> </p>



    </page>


<?php
$contenue = ob_get_clean() ;
try{

    $pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 5);
    $pdf->pdf->SetDisplayMode('fullpage') ;
    $pdf->writeHTML($contenue);
    $pdf->output('demande.pdf');




}
catch(Html2PdfException $e){

}





?>