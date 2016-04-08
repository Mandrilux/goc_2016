<?php

include('modele/connexion_sql.php');

$list_station = file_get_contents('https://developer.jcdecaux.com/rest/vls/stations/Luxembourg.json');
$list_station_dec = json_decode($list_station));

var_dump(list_station_dec);

//$rep = $bdd->prepare()

?>
