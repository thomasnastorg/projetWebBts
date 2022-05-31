<?php
require_once("Model/PDOmusique.php");

$monPdoMusic = PDOmusique::getPdoMusic();
session_start();
require './Model/Connection.php';
//$_SESSION['connecter'] = false;
if (isset($_POST['connexionUser'])){
     $user = htmlspecialchars(isset($_POST['pseudo']))? $_POST['pseudo'] : '';
     $mp = htmlspecialchars(isset($_POST['mdp']))? $_POST['mdp'] : '';
     $monPdoMusic->getUser($user,$mp);
     if(connecte()){
                ob_start();
                header("Location: index.php?action=accueil") ;
                ob_end_flush();
              //  $action = 'accueil';
            }
}else if(!connecte()){
    $action = 'connexion';
}else{
if(!isset($_REQUEST['action']))
{
    $action = 'accueil';
}
else {
    $action = $_REQUEST['action'];
}
}

if ($action !='pdf') {
    include("View/header.php");
}


switch($action)
{
    case 'connexion':
        include("./View/connexion.php");
        break;
    case 'accueil':

        include("View/v_accueil.php");
        break;

    case 'cours':
        $lesSeances = $monPdoMusic->getCours() ;
        include("View/cours.php");
        break;
    case 'Inscription':

        $coursSelectionne = $_REQUEST['coursSelectionne'];
        include("View/inscription.php");
        break;

    case 'valderinscription':
        if (isset($_POST['save'])){
            $nom = htmlspecialchars(isset($_POST['nom']))? $_POST['nom'] : '';
            $prenom = htmlspecialchars(isset($_POST['prenom']))? $_POST['prenom'] : '';
            $tel = htmlspecialchars(isset($_POST['tel']))? $_POST['tel'] : '';
            $adrress = htmlspecialchars(isset($_POST['adrress']))? $_POST['adrress'] : '';
            $mail = htmlspecialchars(isset($_POST['mail']))? $_POST['mail'] : '';
            $numero = htmlspecialchars(isset($_POST['numero']))? $_POST['numero'] : '';
            $numcours = htmlspecialchars(isset($_POST['numcours']))? $_POST['numcours'] : '';
            $monPdoMusic->PostAderent($nom,$prenom,$tel,$adrress,$mail,$numcours);
            include("View/okInscription.php");
            break ;

}
    case 'affichagincription':
        $lesSeances = $monPdoMusic->getAffichaInscrptionFN();

        include("View/affichagincription.php");
        break;
    case 'pdf':
       if(isset($_POST['creatpdf'])){
            $id = htmlspecialchars(isset($_GET['inscriptionpdf']))? $_GET['inscriptionpdf'] : '';
        }
        $monPdoMusic = PDOmusique::getPdoMusic();
        $Inscription = $monPdoMusic->getAffichaUneInscrption($id);
        require('library/fpdf184/fpdf.php');
        include("View/createdPdf.php");
        creerPdf($Inscription);
        break;

    case 'del':
        if(isset($_POST['del'])){
            $iduser = htmlspecialchars(isset($_GET['inscriptiondeluser']))? $_GET['inscriptiondeluser'] : '';
            $id = htmlspecialchars(isset($_GET['inscriptiondelcours']))? $_GET['inscriptiondelcours'] : '';
        }
        $monPdoMusic = PDOmusique::getPdoMusic();
        $Inscription = $monPdoMusic->DelInscription($iduser,$id);




        break;


}
include("View/foot.php") ;
?>


