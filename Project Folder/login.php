<?php
/**
 * Created by PhpStorm.
 * User: Walid Djebbouri
 * Date: 13/03/2018
 * Time: 13:01
 */
session_start();
if(isset($_POST["submit"])) {
    
	if (empty($_POST["email"]) || empty($_POST["mot_passe"])) {
        $error = "Username or Password is invalid";
       
    }
    else
    {
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=algérie_télécome;charset=utf8', 'root', '');

            if($_POST['session'] == "administrateur") $next = 'inscreption.php' ;
            if($_POST['session'] == "commerciale") $next = 'demande.php' ;
            if($_POST['session'] == "technique") $next = 'traville.php' ;


            $req = $bdd->prepare('SELECT * FROM '.$_POST['session'].' WHERE email = ?  ');
            $req->execute(array($_POST['email'])) ;
            $donne = $req->fetch();
            if(password_verify($_POST["mot_passe"] , $donne["mot_passe"])) {
                $_SESSION['id'] = $donne['id'] ;
                $_SESSION['nom'] =  $donne['nom']  ;
                $_SESSION['prenom'] = $donne['prenom'] ;
				$_SESSION['session'] = $_POST['session'] ;
                $_SESSION['erreur']  = false ;
				header("location: ".$next);

            } else {

                $_SESSION['erreur']  = true ;
                header("location: ".$next);
            }


        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }





    }

}
	

?>