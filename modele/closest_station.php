<?php

include_once('./connexion_sql.php');
include_once('./function.php');

function get_close($longitude, $latitude)
{
  global $bdd;
  $data = $bdd->prepare('SELECT id, latitude, longitude FROM `stations_velo`');
  $data->execute();
  
 /* while ($data2 = $data->fetch())
 {*/
  $data2 = $data->fetch();
  $dist = my_get('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$latitude.','.$longitude.'&destinations='.$data2["latitude"].','.$data2["longitude"].'&key=AIzaSyC5WbmOFch6mj7T1L6CXjRMJ0sjdJuFlpc');
    
  //}
  var_dump($dist);
  echo "<br><br>".$dist->{'rows'};
return $dist;
}

get_close(6.126, 49.6173);
?>
