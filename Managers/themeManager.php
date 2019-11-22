<?php 
class themeManager {

    private $_db;

    public function __construct($dbh) {
        $this->setDb($dbh);
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }

    public function add(theme $theme) {
        $q = $this->_db->prepare('INSERT INTO theme(idtheme,nom,categorie,idadmin,dateCRE_T_SUP_T) VALUES(:idTheme, :nom, :categorie, :idAdminIndex, :dateCRE_T_SUP_T)');
        $q->bindvalue(':idTheme', $theme->getIdTheme(), PDO::PARAM_INT);
        $q->bindvalue(':nom', $theme->getNom(), PDO::PARAM_STR);
        $q->bindvalue(':categorie', $theme->getCategorie(), PDO::PARAM_STR);
        $q->bindvalue(':idAdminIndex', $theme->getIdAdminIndex(), PDO::PARAM_STR);
        $q->bindvalue(':dateCRE_T_SUP_T', $theme->getDate(), PDO::PARAM_INT);

        $q->execute();
    }

    public function selectAll() {
        $q = $this->_db->prepare('SELECT * FROM theme');
        $q->execute();
        $check = $q->fetch(PDO::FETCH_BOUND);
        return $check;
    }

    public function removeOne(theme $theme) {
        $q = $this->_db->prepare('DELETE FROM theme WHERE idtheme = :idTheme');
        $q->bindvalue(':idTheme', $theme->getIdTheme(), PDO::PARAM_INT);
        $q->execute();
    }
}
