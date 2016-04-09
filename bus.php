<?php
include_once("modele/function.php");

$URL = 'http://travelplanner.mobiliteit.lu/hafas/query.exe/dot?performLocating=2&tpl=stop2csv&look_maxdist=150000&look_x=6112550&look_y=49610700&stationProxy=yes';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, '');
$resultat = curl_exec ($ch);
curl_close($ch);
$elements = explode(";", $resultat);
foreach ($elements as $data)
{
  $URL = 'http://travelplanner.mobiliteit.lu/restproxy/departureBoard?accessId=cdt&format=json&'.$data.';';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $URL);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, '');
  $resultat = curl_exec ($ch);
  curl_close($ch);
  var_dump($resultat);
}
//var_dump($elements);
?>
