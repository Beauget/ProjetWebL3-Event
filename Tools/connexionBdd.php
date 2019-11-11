<?php 

$dsn = 'mysql:dbname=evenements;host=127.0.0.1';
$user = 'web';
$password = 'ceciestunmotdepassesecurise';
try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

?>