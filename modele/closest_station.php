<?php

include_once('./connexion_sql.php');
include_once('./function.php');

function get_close($longitude, $latitude)
{
  global $bdd;
  $data = $bdd->prepare('SELECT id, latitude, longitude FROM `stations_velo`');
  $data->execute();
  
  while ($data2 = $data->fetch())
  {
    //$data2 = $data->fetch();
    $dist = my_get('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$latitude.','.$longitude.'&destinations='.$data2["latitude"].','.$data2["longitude"].'&key=AIzaSyC5WbmOFch6mj7T1L6CXjRMJ0sjdJuFlpc');
    $dist = json_decode($dist);
    //var_dump($);
    $cur_dist = $dist->{'rows'}[0]->{'elements'}[0]->{'distance'}->{'value'};
    if (isset($min_dist) == false)
    {
      $id_min_dist = $data2['id'];
      $min_dist = $cur_dist;
    }
    elseif ($min_dist > $cur_dist) 
    {
      $id_min_dist = $data2['id'];
      $min_dist = $cur_dist;
    }
      //print_r($lol);
  }
  echo $min_dist;
  echo "          ".$id_min_dist;
  return $id_min_dist;
}

get_close(6.112, 49.5173);
?>
