<?php

$cats = ['Pilkis', 'Pūkis', 'Rainis', 'Murkis'];

$out =  json_encode($cats);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

echo $out;
