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
        $q = $this->_db->prepare('INSERT INTO evenement(idevent,dateEvent,effectif_min,effectif_max,idcontrib,idtheme,dateCRE_E_SUP_E) VALUES(:idevent, :dateEvent, :effectif_min, :effectif_max, :idcontrib, :idtheme, :dateCRE_E_SUP_E)');
        $q->bindvalue(':idevent', $evenement->getIdEvent(), PDO::PARAM_INT);
        $q->bindvalue(':dateEvent', $evenement->getDateEvent(), PDO::PARAM_INT);
        $q->bindvalue(':effectif_min', $evenement->getEffectifMin(), PDO::PARAM_INT);
        $q->bindvalue(':effectif_max', $evenement->getEffectifMax(), PDO::PARAM_INT);
        $q->bindvalue(':idcontrib', $evenement->getIdContrib(), PDO::PARAM_INT);
        $q->bindvalue(':idtheme', $evenement->getIdTheme(), PDO::PARAM_INT);
        $q->bindvalue(':dateCRE_E_SUP_E', $evenement->getDate(), PDO::PARAM_INT);
        $q->execute();
    }
}
