<?php
session_start();


require 'connexion.php' ;
require 'phpmailaire.php' ;
/**
 * Created by PhpStorm.
 * User: Walid Djebbouri
 * Date: 15/03/2018
 * Time: 18:37
 */
class sinscrire
{
    private $connexion;

    function verification($sessione, $email)
    {

        if ($sessione == 'administrateur' || $sessione == 'commerciale' || $sessione == 'technique') {

            $existe = false;
            $connexion = new connexion();
            $db = $connexion->data_base_connect();

            $req = $db->prepare('SELECT * FROM ' . $sessione . ' WHERE email = ? ');
            $req->execute(array($email));
            $donne = $req->fetch();
            if ($donne) {
                $existe = true;
            }

            return $existe;

        } else {

            header('location :erreur.html');
        }

    }


    function inscrir($nom, $prenom, $poste, $nss, $email, $mot_passe, $sessione)
    {


        if ($sessione == 'administrateur' || $sessione == 'commerciale' || $sessione == 'technique') {

            $connexion = new connexion();
            $bd = $connexion->data_base_connect();
            $mot_passe1 = password_hash($mot_passe, PASSWORD_BCRYPT);

            if ($sessione == 'administrateur') {


                $req = $bd->prepare('INSERT INTO ' . $sessione . '( nom , prenom , poste_occuper , nss , email , mot_passe) Values (?,?,?,?,?,?)');
                $req->execute(array($nom, $prenom, $poste, $nss, $email, $mot_passe1));


            } else {

                $req = $bd->prepare('INSERT INTO ' . $sessione . '( nom , prenom , poste_occuper , nss , email , mot_passe , ide) Values (?,?,?,?,?,?,?)');
                $req->execute(array($nom, $prenom, $poste, $nss, $email, $mot_passe1, $_SESSION['id']));


            }
        } else {

            header('location :erreur.html');
        }


    }

    function nv_demande($nom, $prenom, $wilaya, $daira, $commune, $cite, $bloc, $porte, $tel)
    {

        $connexion = new connexion();
        $bdd = $connexion->data_base_connect();

        $req = $bdd->prepare('INSERT INTO client(nom , prenom , wilaya , daira , commune , cité , bloc , porte , telephone ) Values (?,?,?,?,?,?,?,?,?)');
        $req->execute(array($nom, $prenom, $wilaya, $daira, $commune, $cite, $bloc, $porte, $tel));
        $req->closeCursor();

    }


    function inser_demande()
    {

        $connexion = new connexion();
        $bdd = $connexion->data_base_connect();

        $reponse = $bdd->query('select max(id) from client ');

        $client = $reponse->fetch();


        $req = $bdd->prepare('insert into demande (date_demande ,commerciale_idcommerciale ,id) values (CURDATE(),?,?)');
        $req->execute(array($_SESSION['id'], $client[0]));


    }


    function update($id, $nom, $prenom, $poste, $nss, $email, $mot_passe, $sessione)
    {


        if ($sessione == 'administrateur' || $sessione == 'commerciale' || $sessione == 'technique') {


            $connexion = new connexion();
            $bd = $connexion->data_base_connect();

            if ($sessione == 'administrateur') {

                $req = $bd->prepare('update ' . $sessione . ' set nom = ? , prenom = ?, poste_occuper = ? , nss = ? , email = ? , mot_passe = ?    where id = ?');
                $req->execute(array($nom, $prenom, $poste, $nss, $email, $mot_passe, $id));
                $req->closeCursor();

            } else {

                $req = $bd->prepare('update ' . $sessione . ' set nom = ? , prenom = ?, poste_occuper = ? , nss = ? , email = ? , mot_passe = ?     where id = ?');
                $req->execute(array($nom, $prenom, $poste, $nss, $email, $mot_passe, $id));
                $req->closeCursor();


            }

        } else {

            header('location :erreur.html');
        }


    }


    function supprimer($id, $sessione)
    {


        if ($sessione == 'administrateur' || $sessione == 'commerciale' || $sessione == 'technique') {


            $connexion = new  connexion();
            $bdd = $connexion->data_base_connect();
            $req = $bdd->prepare('delete from ' . $sessione . '  where id = ?');
            $req->execute(array($id));
            $req->closeCursor();

        } else {

            header('location :erreur.html');

        }


    }


    function zone($id, $nom)
    {

        $coonexion = new connexion();

        $bdd = $coonexion->data_base_connect();


        $req = $bdd->prepare('SELECT idz FROM zone WHERE nom = ?');

        $req->execute(array($nom));
        if (!($idz = $req->fetch())) {

            $req->closeCursor();

            $req = $bdd->prepare('insert into zone (nom) VALUES (?)');
            $req->execute(array($nom));

            $req->closeCursor();

            $req = $bdd->query('select max(idz) from zone ');
            $idz = $req->fetch();

            $req->closeCursor();

        }


        $req->closeCursor();
        $req = $bdd->prepare('update demande set idzone = ? , traiter= true , technique_idtechnique = ?  where id = ? ');
        $req->execute(array($idz[0], $_SESSION['id'], $id));
        $req->closeCursor();


    }


    function projet($id, $nom, $date)
    {

        $coonexion = new connexion();

        $bdd = $coonexion->data_base_connect();


        $req = $bdd->prepare('SELECT id FROM projet WHERE nom = ?');

        $req->execute(array($nom));
        if (!($idz = $req->fetch())) {

            $req->closeCursor();

            $req = $bdd->prepare('insert into projet (nom , date ) VALUES (? , ?)');
            $req->execute(array($nom, $date));

            $req->closeCursor();

            $req = $bdd->query('select max(id) from projet ');
            $idz = $req->fetch();

            $req->closeCursor();

        }


        $req->closeCursor();
        $req = $bdd->prepare('update demande set idprojet = ? , traiter= true , 	technique_idtechnique = ?   where id = ? ');
        $req->execute(array($idz[0], $_SESSION['id'], $id));
        $req->closeCursor();


    }

    function boitier($id, $reference, $etat, $distance)
    {

        $connexion = new connexion();
        $bdd = $connexion->data_base_connect();

        $req = $bdd->prepare('insert into traitement (etat , reference , distance) VALUES (?,?,?) ');
        $req->execute(array($etat, $reference, $distance));
        $req->closeCursor();

        $req = $bdd->query('select max(id) from traitement');
        $idb = $req->fetch();
        $req->closeCursor();

        $req = $bdd->prepare('update demande set 	idtraitement = ? , traiter= true , 	technique_idtechnique = ?   where id = ? ');
        $req->execute(array($idb[0], $_SESSION['id'], $id));
        $req->closeCursor();


    }


    function reseaux()
    {

        $connexion = new connexion();
        $bdd = $connexion->data_base_connect();
        $rep = $bdd->query('select zone.nom , zone.idz from (select idzone , count(iddemande) as nbd from demande  GROUP BY idzone HAVING count(iddemande) >0) as walid INNER JOIN zone ON zone.idz = walid.idzone and zone.vue = FALSE ');
        if ($rep->fetch()) return true;

    }

    function afficher_zone()
    {

        $connexion = new connexion();
        $bdd = $connexion->data_base_connect();
        $req = $bdd->query('select zone.nom , zone.idz from (select idzone , count(iddemande) as nbd from demande  GROUP BY idzone HAVING count(iddemande) >0) as walid INNER JOIN zone ON zone.idz = walid.idzone and zone.vue = FALSE ');
        return $req;

    }

    function projet_terminer()
    {

        $connexion = new connexion();
        $bdd = $connexion->data_base_connect();
        $rep = $bdd->query('select id from projet where date = CURDATE() and vue = FALSE ');
        if ($rep->fetch()) return true;

    }

    function afficher_projet()
    {

        $connexion = new connexion();
        $bdd = $connexion->data_base_connect();
        $req = $bdd->query('select id , nom from projet where date = CURDATE() and vue = FALSE ');
        return $req;

    }


    function marquer_lue($tableau, $type)
    {

        $connexion = new connexion();
        $bdd = $connexion->data_base_connect();

        if ($type == 'zone') {

            $req = $bdd->prepare('update zone set vue = TRUE  where idz = ?');
            $req->execute(array($tableau));
            $req->closeCursor();


        }
        if ($type == 'projet') {

            $req = $bdd->prepare('update projet set vue = TRUE  where id = ?');
            $req->execute(array($tableau));
            $req->closeCursor();


        }


    }


    function mot_passe_oublier($email, $session)
    {
        $phpmail = new phpmailaire();

        if ($this->verification($session, $email)) {
            $code = rand(100000, 999999);
            $_SESSION['confirmation'] = $code;
            $_SESSION['email'] = $email;
            $_SESSION['sessione'] = $session;
            $phpmail->envoyer_message($code, $email);
            header("location: change_mot_de_passe.php");
        } else {
            $_SESSION['erreur'] = true;
            header("location: mot_de_passe.php");


        }

    }

    function modifier_mot_de_passe($password, $confirmation)
    {


        if ($confirmation == $_SESSION['confirmation']) {

            $connexion = new connexion();
            $bdd = $connexion->data_base_connect();
            $req = $bdd->prepare('update ' . $_SESSION['sessione'] . ' set mot_passe = ?  where email = ?');
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $req->execute(array($hash, $_SESSION['email']));
            $req->closeCursor();
            header('location: ' . $_SESSION['sessione'] . '.php');

        } else {

            $_SESSION['erreur'] = true;
            header('location: change_mot_de_passe.php');
        }


    }

    function rechercher_par_id($id)
    {
        $connexion = new connexion();
        $bdd = $connexion->data_base_connect();

        $req = $bdd->prepare('select * from demande WHERE iddemande = ?');
        $req->execute(array($id)) ;


        if($donne = $req->fetch()){

            if($donne['traiter'] == "1" ){

                if(!empty($donne['idzone'])  ){

                    $_SESSION['traitement'] ="La zone est non couverte" ;
                    $_SESSION['sucsse'] = "error" ;
                }
                if( !empty($donne['idprojet']) ){

                    $_SESSION['traitement'] ="Le Projet Est En Cour De Realisation";
                    $_SESSION['sucsse'] = "error" ;
                }
                if( !empty($donne['idtraitement']) ){

                    $req = $bdd->query('select * from traitement where id = '.$donne['idtraitement']);
                    $donne = $req->fetch();
                    if($donne['etat'] == 'eloigne'){

                        $_SESSION['traitement'] = "La Boite elle est loigne de Toi" ;
                        $_SESSION['sucsse'] ="error";
                    }
                    else{

                        if ($donne['etat'] == 'sature'){

                            $_SESSION['traitement'] = "La Boite elle est Complètement Saturée" ;
                            $_SESSION['sucsse'] ="error";
                        }
                        else{

                            $_SESSION['traitement'] = "La demande est traitée" ;
                            $_SESSION['sucsse'] ="success";
                        }
                    }


                }

            }
            else{

                $_SESSION['traitement'] = "La demande pas encore traité";
                $_SESSION['sucsse'] ="error";
            }

        }
        else{

            $_SESSION['traitement'] = "pas de demande avec ce id";
            $_SESSION['sucsse'] ="error";
        }

        $req->closeCursor();
        header("location: recherche.php");

    }


    function recherche_par_nom($nom, $prenom)
    {
        $connexion = new connexion() ;
        $bdd = $connexion->data_base_connect();

        $req = $bdd->prepare('select id from client where nom = ? AND prenom = ? ');
        $req->execute(array($nom , $prenom));
        $donne = $req->fetch() ;

        if(!empty($donne['id']) ){

            $req = $bdd->prepare('select iddemande from demande where id = ?  ');
            $req->execute(array($donne['id']));
            $donne = $req->fetch() ;
            $this->rechercher_par_id($donne['iddemande']) ;
        }
        else{

            $_SESSION['traitement'] = "pas de client de ce nom";
            $_SESSION['sucsse'] ="error";
            header("location: recherche.php");
        }

    }

}


?>