<?php

function my_get($URL)
{
  $c = curl_init();
  curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($c, CURLOPT_URL, $URL);
  $contents = curl_exec($c);
  curl_close($c);

  if ($contents) return $contents;
  else return FALSE;
}

function get_info_station($id)
{
  $dataJ = my_get('https://api.jcdecaux.com/vls/v1/stations/'.$id.'?contract=Luxembourg&apiKey=58a7596376f3ae8c4af270a5abc6b7c04ecff44c');
  $data = json_decode($dataJ);
  $new_data = array('banking' => $data->{'banking'},
		    'status' => $data->{'status'},
		    'nb_place' => $data->{'bike_stands'},
		    'nb_libre' => $data->{'available_bike_stands'},
		    'nb_dispo' => $data->{'available_bikes'},
		    'longitude' => $data->{'position'}->{'lng'},
		    'latitude' => $data->{'position'}->{'lat'},
		    'nom' => $data->{'name'});
  return ($new_data);
}

function get_total_station()
{
  global $bdd;
  $req = $bdd->prepare('SELECT id FROM `stations_velo`');
  $req->execute();
  $nb = 0;
  while ($donne = $req->fetch())
    {
      $temp = get_info_station($donne['id']);
      if ($temp['status'] == "OPEN")
	$nb++;
    }
  return ($nb);
}

function get_all_velo()
{
  global $bdd;
  $req = $bdd->prepare('SELECT id FROM `stations_velo`');
  $req->execute();
  $total = 0;
  while ($donne = $req->fetch())
    {
      $temp = get_info_station($donne['id']);
      if ($temp['status'] == "OPEN")
	$total += $temp['nb_dispo'];
    }
  return ($total);
}

function get_closest_station($longitude, $latitude)
{
  global $bdd;
  $data = $bdd->prepare('SELECT id, latitude, longitude FROM `stations_velo`');
  $data->execute();

  $tab_data = array();
  while ($data2 = $data->fetch())
    array_push($tab_data, $data2);
  $stop = 1;
  while ($stop == 1)
    {
      $stop = 0;
      foreach($tab_data as $data2)
	{
	  $dist = my_get('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$latitude.','.$longitude.'&destinations='.$data2["latitude"].','.$data2["longitude"].'&key=AIzaSyAjqXObOfejk1teXHKNzixJdCUmT-J1sRw');
	  $dist = json_decode($dist);
	  //var_dump($dist);
	  if (!isset($dist->{'rows'}[0]->{'elements'}[0]->{'distance'}->{'value'}))
	    {
	      var_dump($dist);
	      die("error");
	    }
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
      $info = get_info_station($id_min_dist);
      /* if ($info['nb_dispo'] == 0)
	{
	  $i = 0;
	  $stop = 1;
	  while($tab_data[$i])
	    {
	      if ($tab_data[$i]['id'] == $id_min_dist)
		unset($tab_data[$i]);
	      $i++;
	    }
	    }*/
    }
  array_push($info, $min_dist);
  //var_dump($info);
  return ($info);
}
