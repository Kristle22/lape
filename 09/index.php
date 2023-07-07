<?php

$cats = ['Pilkis', 'Pūkis', 'Rainis', 'Murkis'];

for($i = 0; $i < 300; $i++) {
  $cats[] = $cats[rand(0, 3)];
}

sleep(5);

$out =  json_encode($cats);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

echo $out;
