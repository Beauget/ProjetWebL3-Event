<?php

class contributeur
{

    private $_idcontrib;
    private $_email;
    private $_nom;
    private $_prenom;
    private $_age;
    private $_pseudo;
    private $_password;

    public function __construct($idcontrib, $email, $nom, $prenom, $age, $pseudo,$password, $args)
    {
        switch ($args) {
            case 6:
                $this->setIdContrib($idcontrib);
                $this->setEmail($email);
                $this->setNom($nom);
                $this->setPrenom($prenom);
                $this->setAge($age);
                $this->setPseudo($pseudo);
                $this->setPassword($password);
                break;
            default:
                echo "Le nombre d'argument est incorrect ! ";
                $this->__destruct();
        }
    }

    public function setPassword($password){
        $this->_password = $password;
    }

    public function setIdContrib($idcontrib)
    {
        $this->_idcontrib = $idcontrib;
    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function setNom($nom)
    {
        $this->_nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->_prenom = $prenom;
    }

    public function setAge($age)
    {
        $this->_age = $age;
    }

    public function setPseudo($pseudo)
    {
        $this->_pseudo = $pseudo;
    }

    public function getIdContrib()
    {
        return $this->_idcontrib;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function getNom()
    {
        return $this->_nom;
    }

    public function getPrenom()
    {
        return $this->_prenom;
    }

    public function getAge()
    {
        return $this->_age;
    }

    public function getPseudo()
    {
        return $this->_pseudo;
    }
    public function getPassword(){
        return $this->_password;
    }

}
