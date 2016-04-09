<?php

include_once('./connexion_sql.php');
include_once('./function.php');

function get_closest_station($longitude, $latitude)
{
  global $bdd;
  $data = $bdd->prepare('SELECT id, latitude, longitude FROM `stations_velo`');
  $data->execute();

  $tab_data = array();
  while ($data2 = $data->fetch())
    array_push($tab_data, $data2);
  foreach($tab_data as $data2)
  {
    echo "lol";
    $dist = my_get('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$latitude.','.$longitude.'&destinations='.$data2["latitude"].','.$data2["longitude"].'&key=AIzaSyC5WbmOFch6mj7T1L6CXjRMJ0sjdJuFlpc');
    $dist = json_decode($dist);
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
  }
  echo $min_dist;
  echo $id_min_dist;
  $info = get_info_station($id_min_dist);
  if ($info['dispo_velo'] == 0)
  {
    $i = 0;
    while($tab_data[$i])
    {
      if ($tab_data[$i]['id'] == $id_min_dist)
	unset($tab_data[$i]);
      $i++;
    }
  }
}

get_closest_station(6, 49);

?>
