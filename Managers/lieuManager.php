<?php
class lieuManager
{

    private $_db;

    public function __construct($dbh)
    {
        $this->setDb($dbh);
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }

    public function add(lieu $lieu)
    {
        $q = $this->_db->prepare('INSERT INTO lieu(idlieu, ville, rue, numero_rue, code_postal, position_long, position_lat) VALUES(:idlieu, :ville, :rue, :numero_rue, :code_postal, :position_long, :position_lat)');
        $q->bindvalue(':idlieu', $lieu->getIdLieu(), PDO::PARAM_INT);
        $q->bindvalue(':ville', $lieu->getVille(), PDO::PARAM_STR);
        $q->bindvalue(':rue', $lieu->getRue(), PDO::PARAM_STR);
        $q->bindvalue(':numero_rue', $lieu->getNumeroRue(), PDO::PARAM_INT);
        $q->bindvalue(':code_postal',  $lieu->getCodePostal(), PDO::PARAM_INT);
        $q->bindvalue(':position_long', $lieu->getPositionLong(), PDO::PARAM_STR);
        $q->bindvalue(':position_lat', $lieu->getPositionLat(), PDO::PARAM_STR);

        $q->execute();
    }
}
