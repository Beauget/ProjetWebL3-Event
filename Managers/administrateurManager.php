<?php 
class administrateurManager {

    private $_db;

    public function __construct($dbh) {
        $this->setDb($dbh);
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }

    public function add(administrateur $admin) {
        $q = $this->_db->prepare('INSERT INTO administrateur(idadmin,nom,prenom,email,password) VALUES(:idadmin, :nom, :prenom,:email,:password)');
        $q->bindvalue(':idvisit', $admin->getIdAdmin(), PDO::PARAM_INT);
        $q->bindvalue(':email', $admin->getEmail(), PDO::PARAM_STR);
        $q->bindvalue(':prenom', $admin->getPrenom(), PDO::PARAM_STR);
        $q->bindvalue(':nom', $admin->getNom(), PDO::PARAM_STR);
        $q->bindvalue(':password', $admin->getPassword(), PDO::PARAM_STR);

        $q->execute();

    }
    public function selectEmail($email) {
        $q = $this->_db->prepare('SELECT * FROM administrateur WHERE email = :email');
        $q->bindvalue(':email',$email,PDO::PARAM_STR);
        $q->execute();
        $check = $q->fetch(PDO::FETCH_BOUND);
        return $check;
    }



    public function selectPassword($password) {
        $q = $this->_db->prepare('SELECT * FROM administrateur WHERE password = :password');
        $q->bindvalue(':password',$password,PDO::PARAM_STR);
        $q->execute();
        $check = $q->fetch(PDO::FETCH_BOUND);
        return $check;
    }
}

?>