<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../Tools/connexionBdd.php';
include '../Tables/theme.php';
include '../Managers/themeManager.php';

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['nom']) && isset($_POST['categorie'])){


    $themeManager = new themeManager($dbh);

    nom
    categorie
    $email = $_POST['email'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];


    $theme = new visiteur(0,$email,$nom,$prenom,$age,$pseudo,$password,5);
    $visiteurManager->add($visiteur);

    echo "Bravo DNS !";
}

else {
    echo "Erreur Controller !";
}


?>