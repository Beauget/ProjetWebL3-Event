<?php

include dirname(__DIR__) . '/Tools/connexionBdd.php';
include dirname(__DIR__) . '/Tables/visiteur.php';
include dirname(__DIR__) . '/Tables/contributeur.php';
include dirname(__DIR__) . '/Tables/administrateur.php';
include dirname(__DIR__) . '/Managers/visiteurManager.php';
include dirname(__DIR__) . '/Managers/administrateurManager.php';
include dirname(__DIR__) . '/Managers/contributeurManager.php';


$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$error = '';

if (isset($_POST['email']) && isset($_POST['password'])) {

  if (empty($_POST['email']) || empty($_POST['password'])) {
    $error =  'Veuillez remplir tout les champs...';
    header("refresh:0.2; url =../index.php?page=connexion&error=$error");
    exit();
  }

  $visiteurManager = new visiteurManager($dbh);
  $administrateurManager = new administrateurManager($dbh);
  $contributeurManager = new contributeurManager($dbh);

  if ($visiteurManager->selectEmail($_POST['email']) && $visiteurManager->selectPassword(crypt($_POST['password'], 'dns'), $_POST['email'])) {
    header("refresh:1; url=../index.php?page=index");
  } else if ($administrateurManager->selectEmail($_POST['email']) && $administrateurManager->selectPassword(crypt($_POST['password'], 'dns'), $_POST['email'])) {
    header("refresh:1; url=../index.php?page=index");
  } else if ($contributeurManager->selectEmail($_POST['email']) && $contributeurManager->selectPassword(crypt($_POST['password'], 'dns'), $_POST['email'])) {
    header("refresh:1; url=../index.php?page=index");
  } else {
    $error = 'Ce compte n\'existe pas veuillez vous inscrire !';
  }
  if ($error != '') {
    header("refresh:0.2; url =../index.php?page=connexion&error=$error");
  }
}
