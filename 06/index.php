<?php

$komoda = [];
foreach(range(1, 10) as $stalcius) {

  foreach(range(1, 10) as $skyrelis) {

    $komoda[$stalcius][$skyrelis] = rand(1, 20);

  }
}

echo '<pre>';
// print_r($komoda);

echo '<br>';
// echo $komoda[3] = 'riestainis';
echo '<br>';
print_r($komoda[5][7]);
echo '<br>';
print_r($komoda);

$sk = 0;
 
foreach($komoda as $stalcius) {

  foreach($stalcius as $skyrelis) {

    if ($skyrelis > 10) $sk++;
  echo '<br>';
  print_r($skyrelis);
  echo '<br>';
  }
}

echo '<br>';
echo '<b style="font-size: 25px; color: crimson">' .$sk .'</b>';
echo '<br>';

$animals = [
  ['name' => 'Pilkis', 'type' => 'cat'],
  ['name' => 'Šarikas', 'type' => 'dog'],
  ['name' => 'Bobikas', 'type' => 'dog'],
  ['name' => 'Juodis', 'type' => 'cat'],
  ['name' => 'Pūkis', 'type' => 'dog'],
];

foreach($animals as &$animal) {
  if($animal['type'] == 'cat') {
    echo '<br>';
    echo $animal['name'];
  }
  if ('Pūkis' == $animal['name']) {
    $animal['type'] = 'cat';
  }
  unset($animal);
}

foreach($animals as $k => $animal) {
  if ('Pūkis' ==$animal['name']) {
    $animals[$k]['type'] = 'cat';
  }
}

print_r($animals);


// destruktorius
function daugiklis($a, $b, $c) {
  $rez = $a * $b * $c;
  return "<h2>$rez</h2>";
}

$mas = [5, 5, 10];

echo daugiklis(...$mas);

// konstruktorius
function daugiklisM(...$m) {
  $rez = $m[0] * $m[1] * $m[2];
  return "<h2>$rez</h2>";
}

function daugiklisM1($a, ...$m) {
  $rez = $m[0] * $m[1] * $a;
  return "<h2>$rez</h2>";
}

echo daugiklisM(...$mas);
echo daugiklisM(6, 6, 10);
echo daugiklisM1(6, 6, 10);

// Statikas
function kelintas() {
  static $k = 0;
  $k++;
  return $k;
}

echo kelintas();
echo kelintas();
echo kelintas();
echo kelintas();
echo kelintas();

// anonimine funkcija
$bevardo = function() {
  echo '<br>As neturiu vardo..';
};

$bevardo();
