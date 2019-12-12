
<?php
include dirname(__DIR__) . '/Managers/evenementManager.php';
include dirname(__DIR__) . '/Tools/connexionBdd.php';
include dirname(__DIR__) . '/Tables/theme.php';
include dirname(__DIR__) . '/Tables/lieu.php';
include dirname(__DIR__) . '/Tables/evenement.php';
include dirname(__DIR__) . '/Managers/themeManager.php';
include dirname(__DIR__) . '/Managers/lieuManager.php';


$eventManager2 = new evenementManager($dbh);
$eventArray = $eventManager2->selectAll();
?>


<script>
 var evenement = <?php  echo json_encode($eventArray); ?>;
</script>

<?php include 'MapScript.html'; ?>

