<?php
// 5. Sukurkite masyvą iš 30 elementų. Kiekvienas masyvo elementas yra masyvas [user_id => xxx, place_in_row => xxx] user_id atsitiktinis unikalus skaičius nuo 1 iki 1000000, place_in_row atsitiktinis skaičius nuo 0 iki 100. 

$usersInfo = [];

foreach(range(1, 30) as $key => $element) {
  $usersInfo[$key]['user_id'] = rand(1, 1000000);
  $usersInfo[$key]['place_in_row'] = rand(1, 100);

  usort($usersInfo, function($a, $b) {
    return $a['user_id'] <=> $b['user_id']; });
  usort($usersInfo, function($a, $b) {
    return $b['place_in_row'] <=> $a['place_in_row']; });
}

echo '<pre>Users Info:';
print_r($usersInfo);

// 6. Išrūšiuokite 5 uždavinio masyvą pagal user_id didėjančia tvarka. Ir paskui išrūšiuokite pagal place_in_row mažėjančia tvarka. ^5 uzd.^

// 7. Prie 6 uždavinio masyvo antro lygio masyvų pridėkite dar du elementus: name ir surname. Elementus užpildykite stringais iš atsitiktinai sugeneruotų lotyniškų raidžių, kurių ilgiai nuo 5 iki 15.

// a)
$raides = range('A', 'Z') ;

foreach($usersInfo as $key => $element) {
  $name = '';
  foreach(range(1, rand(5, 15)) as $letter) {
    $name .= $raides[rand(0, 25)];
  }
  $surname = '';
  foreach(range(1, rand(5, 15)) as $letter) {
    $surname .= $raides[rand(0, 25)];
  }
  $usersInfo[$key]['name'] = $name;
  $usersInfo[$key]['surname'] = $surname;
}

// b)
foreach($usersInfo as $key => $element) {
  $name = '';
  foreach(array_rand($raides, rand(5, 15)) as $letter) {
    $name .= $raides[$letter];
  }
  $surname = '';
  foreach(array_rand($raides, rand(5, 15)) as $letter) {
    $surname .= $raides[$letter];
  }
  $usersInfo[$key]['name'] = $name;
  $usersInfo[$key]['surname'] = $surname;
}
echo '<br>Name$Surname:';
print_r($usersInfo);

// 8. Sukurkite masyvą iš 10 elementų. Masyvo reikšmes užpildykite pagal taisyklę: generuokite skaičių nuo 0 iki 5. Ir sukurkite tokio ilgio masyvą. Jeigu reikšmė yra 0 masyvo nekurkite. Antro lygio masyvo reikšmes užpildykite atsitiktiniais skaičiais nuo 0 iki 10. Ten kur masyvo nekūrėte reikšmę nuo 0 iki 10 įrašykite tiesiogiai.

$array = [];

foreach(range(1, 10) as $element) {
  $random = rand(0, 5);

  foreach(range(1, $random) as $number) {
    $random > 0 ? $array[$element][$number] = rand(0, 10) : $array[$element] = rand(0, 10);
  }
}

echo '<br>Number Array:';
print_r($array);

// 9. Paskaičiuokite 8 uždavinio masyvo visų reikšmių sumą ir išrūšiuokite masyvą taip, kad pirmiausiai eitų mažiausios masyvo reikšmės arba jeigu reikšmė yra masyvas, to masyvo reikšmių sumos.

$sumArray = [];

foreach($array as $key => $val) {
  $sumArray[$key] = is_array($val) ? array_sum($val) : $val;
  
}
asort($sumArray);

$keys = array_keys($sumArray);
$sortedArr = [];

foreach($keys as $val) {
  $sortedArr[] = $array[$val];

}
 
echo '<br>Sum of all elements : ';
print_r($sumArray);
echo '<br>Order of keys : ';
print_r($keys);
echo '<br>Ordered Array : ';
print_r($sortedArr);

// 10. Sukurkite masyvą iš 10 elementų. Jo reikšmės masyvai iš 10 elementų. Antro lygio masyvų reikšmės masyvai su dviem elementais value ir color. Reikšmė value vienas iš atsitiktinai parinktų simbolių: #%+*@裡, o reikšmė color atsitiktinai sugeneruota spalva formatu: #XXXXXX. Pasinaudoję masyvų atspausdinkite “kvadratą” kurį sudarytų masyvo reikšmės nuspalvintos spalva color.

$symbols = '#%+*@裡';
$len = strlen($symbols);
$color = '#';
$masyvas = [];

foreach(range(1, 10) as $el) {
  foreach(range(1, 10) as $subEl) {
    foreach(range(1, 2) as $key => $val) {
      $masyvas[$el][$subEl]['value'] = $symbols[rand(0, $len-1)];
      $masyvas[$el][$subEl]['color'] = $color .dechex(mt_rand(0, 16777215));
    }
  }
}

print_r($masyvas);
echo '<br>';

for($y = 0; $y < 10; $y++) {
  for($x = 0; $x < 10; $x++) {
    echo "<span style='display: inline-block; width: 17px; text-align: center; color: {$masyvas[rand(1,10)][rand(1,10)]['color']}'>{$masyvas[rand(1,10)][rand(1,10)]['value']}</span>";
  }
  echo "\n";
}


