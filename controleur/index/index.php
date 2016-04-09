<?php

include_once('modele/function.php');
if ((isset($_POST['longitude']) && isset($_POST['latitude']) )|| (isset($_POST['adresse']) && !empty($_POST['adresse']))
  {
    $data = get_closest_station($_POST['longitude'], $_POST['latitude'], $_POST['adresse'], 0);
    if (isset($_POST['arrival']) && !empty($_POST['arrival']))
      $arrival = get_closest_station($_POST['longitude'], $_POST['latitude'], $_POST['arrival'], 1);
  }
include_once('vue/index/index.php');