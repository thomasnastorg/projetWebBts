<?php

class PDOmusique
{

    private static $monPdo;
    private static $monPdoMusic = null;

    private function __construct(){
        $username = "userProjetBTS";
        $password = "qelT60w74ZaolNVx";
        PDOmusique::$monPdo = new PDO('mysql:host=46.105.30.38;dbname=projetBTS',$username,$password);
        PDOmusique::$monPdo->query("SET CHARACTER SET utf8");
    }
    private function _destruct(){
        PDOmusique::$monPdo = null;
    }
    public  static function getPdoMusic(){
        if(PDOmusique::$monPdoMusic==null){
            PDOmusique::$monPdoMusic= new PDOmusique();
        }
        return PDOmusique::$monPdoMusic;
    }

    public  static function getMonPdo(){

        return PDOmusique::$monPdo;
    }

    public function getCours(){

        try {

            $cours = array();

            $req = "SELECT * FROM cours c INNER JOIN personne p on c.prof = p.id INNER JOIN instrument g on g.id = c.instrument";


            $rs = self::$monPdo->prepare($req) ;

            $rs->execute() ;

            $cours = $rs->fetchAll();
            return $cours;

        }
        catch (PDOException $e) {

            echo 'Échec lors de la connexion : ' . $e->getMessage();

        }

    }
    public function PostAderent($nom,$prenom,$tel,$adres,$mail, $numCours){

        try {

            $req = "INSERT INTO personne( nom, prénom, tel, adres, mail) VALUES ('$nom','$prenom','$tel','$adres','$mail')";

            $rs= self::$monPdo->query($req) ;

            echo $req ;


            $req1 = "SELECT `id` FROM `personne` WHERE `nom` = '$nom'and `prénom` = '$prenom' and `tel` ='$tel' and `adres` = '$adres' and `mail`= '$mail'";

            $rs = self::$monPdo->query($req1) ;

            $data2 = $rs-> fetch(PDO::FETCH_ASSOC);

            $number = $data2['id'];

            $req3 = "INSERT INTO adherent(id, niveaux) VALUES ('$number','Debutant')";

            $rsss = self::$monPdo->prepare($req3) ;

            $rsss->execute();

            $req3 = "INSERT INTO inscription(idad, idcours, paye) VALUES (' $number','$numCours', 0)";

            $rssss = self::$monPdo->prepare($req3) ;

            $rssss->execute();


        }
        catch (PDOException $e) {

            echo 'Échec lors de la connexion : ' . $e->getMessage();

        }

    }

    public function getAffichaInscrptionFN(){
        try {

            $inscrption = array();

            $req = "SELECT * FROM inscription c INNER JOIN cours p on c.idcours = p.id INNER JOIN personne g on g.id = c.idad";


            $rs = self::$monPdo->prepare($req) ;

            $rs->execute() ;

            $inscrption = $rs->fetchAll();
            return $inscrption;

        }
        catch (PDOException $e) {

            echo 'Échec lors de la connexion : ' . $e->getMessage();

        }
    }
    public function getAffichaUneInscrption($id){
        try {

            $inscrption = array();

            $req = "SELECT * FROM inscription c INNER JOIN cours p on c.idcours = p.id INNER JOIN personne g on g.id = c.idad WHERE idad = '$id' ";


            $rs = self::$monPdo->prepare($req) ;

            $rs->execute() ;

            $inscrption = $rs->fetchAll();
            return $inscrption;

        }
        catch (PDOException $e) {

            echo 'Échec lors de la connexion : ' . $e->getMessage();

        }
    }

    public function getUser($user,$mp){
        try {



            $req = "SELECT `pseudo`, `mdp` FROM `user` WHERE `pseudo` = ? ";


            $rs = self::$monPdo->prepare($req) ;

            $rs->execute(array($user)) ;

            $data = $rs->fetch();
            $row = $rs->rowCount();
            if($row == 1 ){
                if($data['mdp'] == $mp){
                    $_SESSION['connecter'] = true;
                }else{
                    $_SESSION['connecter'] = false;
                }
            }else{
                $_SESSION['connecter'] = false;
            }

        }
        catch (PDOException $e) {

            echo 'Échec lors de la connexion : ' . $e->getMessage();

        }
    }
}