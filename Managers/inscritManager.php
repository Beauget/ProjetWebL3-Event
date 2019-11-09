<?php 
class InscriptionManager {

    private $_db;

    public function __construct($dbh) {
        $this->setDb($dbh);
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }

    public function add(visiteur $visiteur) {
        $q = $this->_db->prepare('INSERT INTO visiteur(idvisit,email, nom,prenom,age,pseudo,password) VALUES(:idvisit, :email, :prenom,:nom, :age, :pseudo,:password)');
        $q->bindvalue(':idvisit', $visiteur->getId(), PDO::PARAM_INT);
        $q->bindvalue(':email', $visiteur->getEmail(), PDO::PARAM_STR);
        $q->bindvalue(':prenom', $visiteur->getPrenom(), PDO::PARAM_STR);
        $q->bindvalue(':nom', $visiteur->getNom(), PDO::PARAM_STR);
        $q->bindvalue(':age', $visiteur->getAge(), PDO::PARAM_INT);
        $q->bindvalue(':pseudo', $visiteur->getPseudo(), PDO::PARAM_STR);
        $q->bindvalue(':password', $visiteur->getPassword(), PDO::PARAM_STR);

        $q->execute();
    
    }
}

?>