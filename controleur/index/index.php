<?php

include_once('modele/function.php');
if (isset($_POST['longitude']) && isset($_POST['latitude']))
  {
    $data = get_closest_station($_POST['longitude'], $_POST['latitude']);
  }
include_once('vue/index/index.php');