<?php
include_once("modele/function.php");
$dataJ = my_get('http://travelplanner.mobiliteit.lu/hafas/query.exe/dot?performLocating=2&tpl=stop2csv&stationProxy=yes&look_maxdist=150&look_x=6112550&look_y=49610700');
$dataJ = json_decode($dataJ);
var_dump($dataJ);
?>
