<?php

include_once('modele/connexion_sql.php');

$data = $bdd->prepare('SELECT id, latitude, longitude FROM `stations_velo`');
$data->execute(array());


?>
