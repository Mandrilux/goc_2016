<?php

include('modele/connexion_sql.php');

$list_station = file_get_contents('https://developer.jcdecaux.com/rest/vls/stations/Luxembourg.json');
//var_dump($list_station);
//$rep = $bdd->prepare()
echo $list_station[0];
?>
