<?php
class evenementManager
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

    public function add(evenement $evenement)
    {
        $q = $this->_db->prepare('INSERT INTO evenement(idevent,nomEvent,dateEvent,effectif_min,effectif_max,idcontrib,idtheme,idLieu,description,dateCRE_E_SUP_E) VALUES(:idevent, :dateEvent, :nomEvent, :effectif_min, :effectif_max, :idcontrib, :idtheme, :idlieu,:description :dateCRE_E_SUP_E)');
        $q->bindvalue(':idevent', $evenement->getIdEvent(), PDO::PARAM_INT);
        $q->bindvalues(':nomEvent', $evenement->getNomEvent(), PDO::PARAM_STR);
        $q->bindvalue(':dateEvent', $evenement->getDateEvent(), PDO::PARAM_INT);
        $q->bindvalue(':effectif_min', $evenement->getEffectifMin(), PDO::PARAM_INT);
        $q->bindvalue(':effectif_max', $evenement->getEffectifMax(), PDO::PARAM_INT);
        $q->bindvalue(':idcontrib', $evenement->getIdContrib(), PDO::PARAM_INT);
        $q->bindvalue(':idtheme', $evenement->getIdTheme(), PDO::PARAM_INT);
        $q->bindvalue(':idlieu', $evenement->getIdLieu(), PDO::PARAM_INT);
        $q->bindvalue(':description',$evenement->getDescription(),PDO::PARAM_STR);
        $q->bindvalue(':dateCRE_E_SUP_E', $evenement->getDate(), PDO::PARAM_INT);
        $q->execute();
    }
}
