<?php 
class ContributeurManager {

    private $_db;

    public function __construct($dbh) {
        $this->setDb($dbh);
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }

    public function add(contributeur $contributeur) {
        $q = $this->_db->prepare('INSERT INTO contributeur(idvisit,email, nom,prenom,age,pseudo,password) VALUES(:idvisit, :email, :prenom,:nom, :age, :pseudo,:password)');
        $q->bindvalue(':idvisit', $contributeur->getId(), PDO::PARAM_INT);
        $q->bindvalue(':email', $contributeur->getEmail(), PDO::PARAM_STR);
        $q->bindvalue(':prenom', $contributeur->getPrenom(), PDO::PARAM_STR);
        $q->bindvalue(':nom', $contributeur->getNom(), PDO::PARAM_STR);
        $q->bindvalue(':age', $contributeur->getAge(), PDO::PARAM_INT);
        $q->bindvalue(':pseudo', $contributeur->getPseudo(), PDO::PARAM_STR);
        $q->bindvalue(':password', $contributeur->getPassword(), PDO::PARAM_STR);

        $q->execute();

    }
    public function selectEmail($email) {
        $q = $this->_db->prepare('SELECT * FROM contributeur WHERE email = :email');
        $q->bindvalue(':email',$email,PDO::PARAM_STR);
        $q->execute();
        $check = $q->fetch(PDO::FETCH_BOUND);
        return $check;
    }



    public function selectPseudo($pseudo) {
        $q = $this->_db->prepare('SELECT * FROM contributeur WHERE pseudo = :pseudo');
        $q->bindvalue(':pseudo',$pseudo,PDO::PARAM_STR);
        $q->execute();
        $check = $q->fetch(PDO::FETCH_BOUND);
        return $check;

    }

    public function selectPassword($password) {
        $q = $this->_db->prepare('SELECT * FROM contributeur WHERE password = :password');
        $q->bindvalue(':password',$password,PDO::PARAM_STR);
        $q->execute();
        $check = $q->fetch(PDO::FETCH_BOUND);
        return $check;
    }
}

?>