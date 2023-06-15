<?php

$arr = [];

foreach(range(0, 100) as $val) {
  $arr[$val] = $val%10 ? 'B' : 'A';
}
echo '<pre>';
print_r($arr);

foreach($arr as $key => $val) {
  $innerArr = [];
  foreach(range(1, rand(3, 10)) as $_) {
    $innerArr[] = $val;
  }
  $arr[$key] = $innerArr;
}

echo '<br>';
print_r($arr);

foreach($arr as $key => &$val) {
  if (count($val) == 10) {
    continue;
  }
  foreach(range(1, 10 - count($val)) as $_) {
    $val[] = 'C';
  }
}

echo '<br>';
print_r($arr);

// 11. Duotas kodas, generuojantis masyvą:
do {
  $a = rand(0, 1000);
  $b = rand(0, 1000);
} while ($a == $b);
$long = rand(10,30);
$sk1 = $sk2 = 0;
echo '<h3>Skaičiai '.$a.' ir '.$b.'</h3>';
$c = [];
for ($i=0; $i< $long; $i++) {
  $c[] = array_rand(array_flip([$a, $b]));
}

$countVal = array_count_values($c);
$flipArr = array_flip($countVal);

$sk1 = array_search($a, $flipArr); 
$sk2 = array_search($b, $flipArr); 

echo '<h4>Masyvas:</h4>';
echo '<pre>';
print_r($c);
echo '<br>';
print_r($countVal);
print_r($flipArr);
echo '</pre>';
// Reikia apskaičiuoti kiek buvo $sk1 ir $sk2 naudojantis matematika.
//Atsakymą reikia pateikti formatu: '<h3>Skaičius 789 yra pakartotas '.$sk1.' kartų, o skaičius 123 - '.$sk2.' kartų.</h3>';

echo "<h3>Skaičius $a yra pakartotas $sk1 kartų, o skaičius $b - $sk2 kartų.</h3>";

// 'Live' masyvo generatorius
function gen_one_to_three() {
  for ($i = 0; $i <= 3; $i++) {
      yield $i => rand(1000, 9999);
  }
}

foreach (gen_one_to_three() as $key => $value) {
  echo "$key => $value\n";
}