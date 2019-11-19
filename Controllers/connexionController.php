<?php 

include dirname(__DIR__) . '/Tools/connexionBdd.php';
include dirname(__DIR__) . '/Tables/visiteur.php';
include dirname(__DIR__) . '/Tables/contributeur.php';
include dirname(__DIR__) . '/Tables/administrateur.php';
include dirname(__DIR__) . '/Managers/visiteurManager.php';
include dirname(__DIR__) . '/Managers/administrateurManager.php';
include dirname(__DIR__) . '/Managers/contributeurManager.php';


$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['email']) && isset($_POST['password'])) {

    if (empty($_POST['email']) || empty($_POST['password'])){
        echo '<div class="alert alert-primary" role="alert">
        <p>Veuiller remplir tout les champs...</p>
      </div>';
    header("refresh:3; url=../index.php?page=createUser");
    exit();
    }

    $visiteurManager = new visiteurManager($dbh);
    $administrateurManager = new administrateurManager($dbh);
    $contributeurManager = new contributeurManager($dbh);

    if($visiteurManager->selectEmail($_POST['email']) && $visiteurManager->selectPassword(password_hash($_POST['password'],PASSWORD_DEFAULT))){
        echo '<div class="alert alert-primary" role="alert">
        <p>Connexion !</p>
      </div>';

      header("refresh:1; url=../index.php?page=index");
    }

    else if($administrateurManager->selectEmail($_POST['email']) && $administrateurManager->selectPassword(password_hash($_POST['password'],PASSWORD_DEFAULT))){
        echo '<div class="alert alert-primary" role="alert">
        <p>Connexion !</p>
      </div>';

      header("refresh:1; url=../index.php?page=index");
    }

    else if($contributeurManager->selectEmail($_POST['email']) && $contributeurManager->selectPassword(password_hash($_POST['password'],PASSWORD_DEFAULT))){
        echo '<div class="alert alert-primary" role="alert">
        <p>Connexion !</p>
      </div>';

      header("refresh:1; url=../index.php?page=index");
    }

    else {
        //echo $visiteurManager->selectEmail($_POST['email']);
        echo $visiteurManager->selectPassword(password_hash($_POST['password'],PASSWORD_DEFAULT));
        echo $contributeurManager->selectPassword(password_hash($_POST['password'],PASSWORD_DEFAULT));
        echo $administrateurManager->selectPassword(password_hash($_POST['password'],PASSWORD_DEFAULT));
        echo '<div class="alert alert-primary" role="alert">
        <p>Ce compte existe pas veuillez vous inscrire ! </p>
      </div>';
    }

}
?>
