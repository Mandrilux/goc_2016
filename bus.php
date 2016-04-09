<?php
1;2802;0cinclude_once("modele/function.php");

$URL = 'http://travelplanner.mobiliteit.lu/hafas/query.exe/dot?performLocating=2&tpl=stop2csv&look_maxdist=150000&look_x=6112550&look_y=49610700&stationProxy=yes';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, '');
$resultat = curl_exec ($ch);
curl_close($ch);
$l = 0;
$elements = explode(";", $resultat);
foreach ($elements as $data)
{
  $ch2 = curl_init();
  if ($l)
  {
    echo "sub";
    $data = substr($data, 1);
    }
  echo '['.$data.']';
//  $URL = 'http://travelplanner.mobiliteit.lu/restproxy/departureBoard?accessId=cdt&format=json&'.$data;
//  curl_setopt($ch2, CURLOPT_URL, $URL);
//  curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
//  curl_setopt($ch2, CURLOPT_USERAGENT, '');
//  $resultat = curl_exec ($ch2);
//  curl_close($ch2);
  //echo $URL;
  echo "<br />";
$l = 1;
  //  var_dump($resultat);
}
//var_dump($elements);
?>
