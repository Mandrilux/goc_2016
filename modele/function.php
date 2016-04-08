<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

function get_info_station($id)
{
  $dataJ = file_get_contents('https://api.jcdecaux.com/vls/v1/stations/'.$id.'?contract=Luxembourg&apiKey=58a7596376f3ae8c4af270a5abc6b7c04ecff44c');
  $data = json_decode($dataJ);
  $new_data = array('banking' => $data->{'banking'},
		    'status' => $data->{'status'},
		    'nb_place' => $data->{'bike_stands'},
		    'nb_libre' => $data->{'available_bike_stands'},
		    'nb_dispo' => $data->{'available_bikes'});
  return ($new_data);
}

function get_total_station()
{
  global $bdd;
  $req = $bdd->prepare('SELECT COUNT(*) AS "nb" FROM `stations_velo`');
  $req->execute();
  $result = $req->fetch();
  return ($result['nb']);
}