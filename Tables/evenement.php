<?php

class evenement
{
    private $_idevent;
    private $_dateEvent;
    private $_effectif_min;
    private $_effectif_max;
    private $_idcontrib;
    private $_idtheme;
    private $_dateCRE_E_SUP_E;

    public function __construct($idevent, $dateEvent, $effectif_min, $effectif_max, $idcontrib, $idtheme, $dateCRE_E_SUP_E, $args)
    {
        switch ($args) {
            case 2:
                $this->setIdEvent($idevent);
                $this->setDateEvent($dateEvent);
                $this->setEffectifMin($effectif_min);
                $this->setEffectifMax($effectif_max);
                $this->setIdContrib($idcontrib);
                $this->setIdTheme($idtheme);
                $this->setDate($dateCRE_E_SUP_E);
                break;
            default:
                echo "Le nombre d'argument est incorrect ! ";
                $this->__destruct();
        }
    }

    public function setIdEvent($idevent)
    {
        $this->_idevent = $idevent;
    }

    public function setDateEvent($dateEvent)
    {
        $this->_dateEvent = $dateEvent;
    }

    public function setEffectifMin($effectif_min)
    {
        $this->_effectif_min = $effectif_min;
    }

    public function setEffectifMax($effectif_max)
    {
        $this->_effectif_max = $effectif_max;
    }

    public function setIdContrib($idcontrib)
    {
        $this->_idcontrib = $idcontrib;
    }

    public function setIdTheme($idtheme)
    {
        $this->_idtheme = $idtheme;
    }

    public function setDate($dateCRE_E_SUP_E)
    {
        $this->_dateCRE_E_SUP_E = $dateCRE_E_SUP_E;
    }

    public function getIdEvent()
    {
        return $this->_idevent;
    }

    public function getDateEvent()
    {
        return $this->_dateEvent;
    }

    public function getEffectifMin()
    {
        return $this->_effectif_min;
    }

    public function getEffectifMax()
    {
        return $this->_effectif_max;
    }

    public function getIdContrib()
    {
        return $this->_idcontrib;
    }

    public function getIdTheme()
    {
        return $this->_idtheme;
    }

    public function getDate()
    {
        return $this->_dateCRE_E_SUP_E;
    }
}
