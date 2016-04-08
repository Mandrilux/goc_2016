<?php

include('modele/connexion_sql.php');

$list_station = file_get_contents('https://developer.jcdecaux.com/rest/vls/stations/Luxembourg.json');
$list_station_dec = json_decode($list_station);




//print_r($list_station_dec);
foreach($list_station_dec as $data)
{
  //  print($data->{'number'});
  $id = $bdd->prepare('SELECT count(id) AS nb FROM `stations_velo` WHERE `id` = :id');
  $is_id_exist = $id->fetch();
  if ($is_id_exist['nb'] > 0)
  {
    $rep = $bdd->prepare('UPDATE `stations_velo` SET `nom` = :nom, `adresse` = :adresse, `latitude` = :latitude, `longitude` = :longitude');
    $rep->execute(array('nom'=>$data->{'name'},
			'adresse'=>$data->{'address'},
			'latitude'=>$data->{'latitude'},
			'longitude'=>$data->{'longitude'}));    
  }
  else
  {
    $rep = $bdd->prepare('INSERT INTO `stations_velo`(`id`, `nom`, `adresse`, `latitude`, `longitude`) VALUES (:id,:nom,:adresse,:latitude,:longitude)');
    $rep->execute(array('id'=>$data->{'number'},
			'nom'=>$data->{'name'},
			'adresse'=>$data->{'address'},
			'latitude'=>$data->{'latitude'},
			'longitude'=>$data->{'longitude'}));
  }
}
?>
