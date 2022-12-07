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
for ($i=0; $i<$long; $i++) {
  $c[] = array_rand(array_flip([$a, $b]));
}
echo '<h4>Masyvas:</h4>';
echo '<pre>';
print_r($c);
echo '</pre>';
// Reikia apskaičiuoti kiek buvo $sk1 ir $sk2 naudojantis matematika.
//Atsakymą reikia pateikti formatu: '<h3>Skaičius 789 yra pakartotas '.$sk1.' kartų, o skaičius 123 - '.$sk2.' kartų.</h3>';
