<?php

include('modele/connexion_sql.php');

$list_station = file_get_contents('https://developer.jcdecaux.com/rest/vls/stations/Luxembourg.json');
$list_station_dec = json_decode($list_station);




//print_r($list_station_dec);
foreach($list_station_dec as $data)
{
  print($data->{'number'});
  //$rep = $bdd->prepare('INSERT INTO `stations_velo`(`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES (:id,:nom,:adresse,:latitude,:longitude)');
/*$rep->execute(array('id'=>1,
		    'nom'=>"lol",
		    'adresse'=>"mdr",
		    'latitude'=>1.5,
		    'longitude'=>5.1));
 */
}
?>
