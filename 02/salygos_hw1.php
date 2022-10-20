<?php
// 1. Sukurkite 4 kintamuosius, kurie saugotų jūsų vardą, pavardę, gimimo metus ir šiuos metus (nebūtinai tikrus). Parašykite kodą, kuris pagal gimimo metus paskaičiuotų jūsų amžių ir naudodamas vardo ir pavardės kintamuosius atspausdintų tokį sakinį :
"Aš esu Vardenis Pavardenis. Man yra XX metai(ų)";

$vardas = 'Kristina';
$pavarde = 'Leonaviciute';
$gimimoMetai = 1983;
$dabMetai = date('Y');

$amzius = $dabMetai - $gimimoMetai;

echo "Aš esu $vardas $pavarde. Man yra $amzius metai(ų)";

// 2. Naudokite funkcija rand(). Sukurkite du kintamuosius ir naudodamiesi funkcija rand() jiems priskirkite atsitiktines reikšmes nuo 0 iki 4. Didesnę reikšmę padalinkite iš mažesnės. Atspausdinkite rezultatą jį suapvalinę iki 2 skaičių po kablelio.

$pirmasSkaicius = rand(0, 5);
$antrasSkaicius = rand(0, 5);

echo "<pre>$pirmasSkaicius <br>$antrasSkaicius</pre>";

if ($pirmasSkaicius > $antrasSkaicius && $antrasSkaicius !== 0) {
  echo round($pirmasSkaicius/$antrasSkaicius, 2);
} elseif ($antrasSkaicius > $pirmasSkaicius && $pirmasSkaicius !==0) {
  echo round($antrasSkaicius/$pirmasSkaicius, 2);
} else if ($pirmasSkaicius === $antrasSkaicius) {
  echo 'Abudu skaiciai yra lygus! Rezultatas: <b>1</b>';
} else echo 'Dalyba is <b>0</b> negalima!';


// 3. Naudokite funkcija rand(). Sukurkite tris kintamuosius ir naudodamiesi funkcija rand() jiems priskirkite atsitiktines reikšmes nuo 0 iki 25. Raskite ir atspausdinkite kintąmąjį turintį vidurinę reikšmę.

$skaicius1 = rand(0, 25);
$skaicius2 = rand(0, 25);
$skaicius3 = rand(0, 25);

echo "<pre>$skaicius1 : $skaicius2 : $skaicius3</pre>";

if ($skaicius1 > $skaicius2 && $skaicius1 < $skaicius3 || 
$skaicius1 > $skaicius3 && $skaicius1 < $skaicius1) {
  echo "Vidurine reiksme turi pirmas skaicius: <b>$skaicius1</b>";
} elseif ($skaicius2 > $skaicius1 && $skaicius2 < $skaicius3 || 
$skaicius2 > $skaicius3 && $skaicius2 < $skaicius1) {
  echo "Vidurine reiksme turi antras skaicius: <b>$skaicius2</b>";
} elseif ($skaicius3 > $skaicius1 && $skaicius3 < $skaicius2 || 
$skaicius3 > $skaicius2 && $skaicius3 < $skaicius1) {
  echo "Vidurine reiksme turi trecias skaicius: <b>$skaicius3</b>";
} else echo 'Du ar daugiau skaiciu yra vienodi!';

// 4. Įvedami skaičiai -a, b, c –kraštinių ilgiai, trys kintamieji (naudokite ​rand()​ funkcija nuo 1 iki 10). Parašykite PHP programą, kuri nustatytų, ar galima sudaryti trikampį ir atsakymą atspausdintų. 

echo '<pre>';

echo '$a = ' .$a = rand(1, 10) .'<br>';
echo '$b = ' .$b = rand(1, 10) . '<br>';
echo '$c = ' .$c = rand(1, 10) . '<br>';

if ($a + $b > $c && $a + $c > $b && $b + $c > $a) {
  echo 'Trikampi sudaryti galima';
} else {
  echo 'Trikampio sudaryti neimanoma';
}