<?php

include dirname(__DIR__) . '/Tools/connexionBdd.php';
include dirname(__DIR__) . '/Tables/visiteur.php';
include dirname(__DIR__) . '/Managers/visiteurManager.php';

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if (isset($_POST['email']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['age']) && isset($_POST['pseudo']) && isset($_POST['password'])) {

  if (empty($_POST['email']) || empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['age']) || empty($_POST['pseudo']) || empty($_POST['password'])) {
    echo '<div class="alert alert-primary" role="alert">
        <p>Veuiller remplir tout les champs...</p>
      </div>';
    header("refresh:3; url=../index.php?page=createUser");
    exit();
  }
  $visiteurManager = new visiteurManager($dbh);

  if ($visiteurManager->selectEmail($_POST['email'])) {
    echo '<div class="alert alert-primary" role="alert">
      <p>Désoler ce mail existe déjà, vous allez être redirigé dans quelques instants...</p>
    </div>';

    header("refresh:3; url=../index.php?page=createUser");
    exit();
  } elseif ($visiteurManager->selectPseudo($_POST['pseudo'])) {
    echo '<div class="alert alert-primary" role="alert">
      <p>Désoler ce pseudo existe déjà, vous allez être redirigé dans quelques instants...</p>
    </div>';

    header("refresh:3; url=../index.php?page=createUser");
    exit();
  } else {


    $email = htmlentities($_POST['email']);
    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $age = htmlentities($_POST['age']);
    $pseudo = htmlentities($_POST['pseudo']);
    $password = crypt(htmlentities($_POST['password']),'dns');

    $visiteur = new visiteur(0, $email, $nom, $prenom, $age, $pseudo, $password, 7);
    $visiteurManager->add($visiteur);

   header("refresh:1; url=../index.php?page=index");
    exit();
  }
}
