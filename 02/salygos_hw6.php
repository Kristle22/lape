<?php

// 6. Naudokite funkcija rand(). Sugeneruokite atsitiktinį skaičių nuo 1 iki 6 ir jį atspausdinkite atitinkame h tage. Pvz skaičius 3- rezultatas: <h3>3</h3>

$sk = rand(1, 6);

echo "<h$sk>$sk</h$sk>";

// 7. Naudokite funkcija rand(). Atspausdinkite 3 skaičius nuo -10 iki 10. Skaičiai mažesni už 0 turi būti žali, 0 - raudonas, didesni už 0 mėlyni. 

echo '<br>skaicius1 = ' .$skaicius1 = rand(-10, 10);
echo '<br>skaicius2 = ' .$skaicius2 = rand(-10, 10);
echo '<br>skaicius3 = ' .$skaicius3 = rand(-10, 10);

$spalva1 = ($skaicius1 < 0) ? 'green' : ($skaicius1 > 0 ? 'blue' : 'red');

$spalva2 = ($skaicius2 < 0) ? 'green' : ($skaicius2 > 0 ? 'blue' : 'red');

$spalva3 = ($skaicius3 < 0) ? 'green' : ($skaicius3 > 0 ? 'blue' : 'red');

echo "<h2 style='color:$spalva1;'>$skaicius1</h2>";
echo "<h2 style='color: $spalva2'>$skaicius2</h2>";
echo "<h2 style='color: $spalva3'>$skaicius3</h2>";

// 8. Įmonė parduoda žvakes po 1 EUR. Perkant daugiau kaip už 1000 EUR taikoma 3 % nuolaida, daugiau kaip už 2000 EUR - 4 % nuolaida. Parašykite programą, kuri skaičiuos žvakių kainą ir atspausdintų atsakymą kiek žvakių ir kokia kaina perkama. Žvakių kiekį generuokite ​rand()​ funkcija nuo 5 iki 3000.

echo '<br>Zvakiu kiekis: ' .$zvakiuKiekis = rand(5, 3000);

$zvakiuKaina = 1;

$zvakiuKaina = $zvakiuKiekis > 1000 && $zvakiuKiekis <= 2000 ? $zvakiuKaina * 0.97 : ($zvakiuKiekis > 2000 ? $zvakiuKaina * 0.96 : $zvakiuKaina); 

$suma = $zvakiuKaina * $zvakiuKiekis;

echo "<br>Perkama $zvakiuKiekis zvakiu po $zvakiuKaina Eur. Moketina suma: $suma Eur.";

//  9. Naudokite funkcija rand(). Sukurkite tris kintamuosius su atsitiktinėm reikšmėm nuo 0 iki 100. Paskaičiuokite jų aritmetinį vidurkį. Ir aritmetinį vidurkį atmetus tas reikšmes, kurios yra mažesnės nei 10 arba didesnės nei 90. Abu vidurkius atspausdinkite. Rezultatus apvalinkite iki sveiko skaičiaus.

echo '<pre>skaicius1 = ' .$sk1 = rand(0, 100);
echo '<pre>skaicius2 = ' .$sk2 = rand(0, 100);
echo '<pre>skaicius3 = ' .$sk3 = rand(0, 100);

$vidurkis = ($sk1 + $sk2 + $sk3) / 3;

echo '<pre>';
echo 'Vidurkis: ' .round($vidurkis, 0);

$skKiekis = 0;
$vidVidurkis = 0;

($sk1 > 10 && $sk1 < 50) ? $skKiekis++ : $sk1 = 0;
($sk2 > 10 && $sk2 < 50) ? $skKiekis++ : $sk2 = 0;
($sk3 > 10 && $sk3 < 50) ? $skKiekis++ : $sk3 = 0;

$skKiekis === 0 ? $vidVidurkis = 'Intervale nuo 10 iki 90 skaiciu nera!' : $vidVidurkis = round(($sk1 + $sk2 + $sk3) / $skKiekis, 0);

echo '<pre>skKiekis: ' .$skKiekis;
echo '<br>Vid-vidurkis: ' .$vidVidurkis;

//  10. Padarykite skaitmeninį laikrodį, rodantį valandas, minutes ir sekundes. Valandom, minutėm ir sekundėm sugeneruoti panaudokite funkciją rand(). Sugeneruokite skaičių nuo 0 iki 300. Tai papildomos sekundės. Skaičių pridėkite prie jau sugeneruoto laiko. Atspausdinkite laikrodį prieš ir po sekundžių pridėjimo ir pridedamų sekundžių skaičių.

echo '<pre>';
echo '<br>Valandos: ' .$valandos = str_pad(rand(0, 23), 2, '0', STR_PAD_LEFT);
echo '<br>Minutes: ' .$minutes = str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT);
echo '<br>Sekundes: ' .$sekundes = str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT);

echo"<pre style='color: red';>Lakrodis: <b>$valandos:$minutes:$sekundes</b>";

echo '</pre>Pap-sekundes: ' .$papSekundes = rand(0, 300);

echo '<pre>Minutes po pridejimo: ' .$minutesPo = floor($papSekundes / 60);

$minutes2 = $minutes + $minutesPo;

echo '<br>Sekundes po pridejimo: ' .$sekundesPo = $papSekundes % 60 ;

$sekundes2 = $sekundes + $sekundesPo;

if ($sekundes2 >= 60) {
  $sekundes2 -= 60;
  $minutes2++;
}
if ($minutes2 >= 60) {
  $minutes2 -= 60;
  $valandos++;
}

$minutes2 = str_pad($minutes2, 2, '0', STR_PAD_LEFT);
$sekundes2 = str_pad($sekundes2, 2, '0', STR_PAD_LEFT);

echo"<pre style='color: red';>Lakrodis_2: <b>$valandos:$minutes2:$sekundes2</b></pre>";

//  11. Naudokite funkcija rand(). Sugeneruokite 6 kintamuosius su atsitiktinem reikšmėm nuo 1000 iki 9999. Atspausdinkite reikšmes viename strige, išrūšiuotas nuo didžiausios iki mažiausios, atskirtas tarpais. Naudoti ciklų ir masyvų NEGALIMA.

$kint1 = rand(1000, 9999);
$kint2 = rand(1000, 9999);
$kint3 = rand(1000, 9999);
$kint4 = rand(1000, 9999);
$kint5 = rand(1000, 9999);
$kint6 = rand(1000, 9999);

$sortStr = "$kint1 $kint2 $kint3 $kint4 $kint5 $kint6";

echo 'Sort_stringas: ' .$sortStr;

function strSorting(&$str, $len, $currpos=0) {
  if($currpos == $len) return;
// Initialize next var position
  $next = $currpos + 1;

  while($next < $len) {
// Logic of swapping the position of character
    if($str[$next] < $str[$currpos]) {
      $temp = $str[$next];
      $str[$next] = $str[$currpos];
      $str[$currpos] = $temp;
    }
    $next++;
  }
  // Recursively call strSorting method, with increment currpos
  strSorting($str, $len, $currpos+1);
}

strSorting($sortStr, strlen($sortStr));

echo '<pre>String after sorting: ' .$sortStr;
echo '<pre>String after sorting: ' .strlen($sortStr);