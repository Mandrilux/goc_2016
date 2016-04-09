<?php
include_once("modele/function.php");



$wikipediaURL = 'http://travelplanner.mobiliteit.lu/hafas/query.exe/dot?performLocating=2&tpl=stop2csv&stationProxy=yes&look_maxdist=150&look_x=6112550&look_y=49610700';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $wikipediaURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, '');
$resultat = curl_exec ($ch);
curl_close($ch);
var_dump($resultat);
$resultat = json_decode($resultat);
//$dataJ = my_get('http://travelplanner.mobiliteit.lu/hafas/query.exe/dot?performLocating=2&tpl=stop2csv&stationProxy=yes&look_maxdist=150&look_x=6112550&look_y=49610700');
//$dataJ = json_decode($dataJ);
?>
