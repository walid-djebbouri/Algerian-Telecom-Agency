<?php 
class connexion{
function data_base_connect()
   {
      try{

          $bdd = new PDO('mysql:host=localhost;dbname=algérie_télécome;charset=utf8', 'root', '');
          $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return ($bdd);

      }
      catch (Exception $e){

          die('Erreur : '.$e->getMessage());


      }


     

   } 
}
?>