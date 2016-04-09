<?php

include_once('./connexion_sql.php');
include_once('./function.php');

function get_closest_station($longitude, $latitude)
{
  global $bdd;
  $data = $bdd->prepare('SELECT id, latitude, longitude FROM `stations_velo`');
  $data->execute();

  while ($data2 = $data->fetch())
    $tab_data = array_push($tab_data, $data2);
  $i = 0;
  while ($tab_data[$i])
  {
    $dist = my_get('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$latitude.','.$longitude.'&destinations='.$tab_data[$i]["latitude"].','.$tab_data[$i]["longitude"].'&key=AIzaSyC5WbmOFch6mj7T1L6CXjRMJ0sjdJuFlpc');
    $dist = json_decode($dist);
    $cur_dist = $dist->{'rows'}[0]->{'elements'}[0]->{'distance'}->{'value'};
    if (isset($min_dist) == false)
    {
      $id_min_dist = $tab_data[$i]['id'];
      $min_dist = $cur_dist;
    }
    elseif ($min_dist > $cur_dist) 
    {
      $id_min_dist = $tab_data[$i]['id'];
      $min_dist = $cur_dist;
    }
    $i++;
  }
  echo $min_dist;
  echo $id_min_dist;
  return get_info_station($id_min_dist);
}
?>
