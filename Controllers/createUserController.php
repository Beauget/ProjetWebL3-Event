<?php 

session_start();

$dsn = 'mysql:dbname=evenements;host=127.0.0.1';
$user = 'web';
$password = 'ceciestunmotdepassesecurise';
try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

include '../Tables/visiteur.php';
include '../Managers/inscritManager.php';

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['email']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['age']) && isset($_POST['pseudo']) && isset($_POST['password'])){
    $visiteurManager = new InscriptionManager($dbh);


    $email = $_POST['email'];
    echo $email;
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    echo $prenom;
    $age = $_POST['age'];
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];


    $visiteur = new visiteur(0,$email,$nom,$prenom,$age,$pseudo,$password,7);
    $visiteurManager->add($visiteur);

    echo "Bravo DNS !";
}

else {
    echo "Erreur Controller !";
}


?>