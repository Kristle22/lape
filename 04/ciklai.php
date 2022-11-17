<?php
//  4. Nupieškite kvadratą iš “*”, kurio kraštines sudaro 100 “*”. Panaudokite css stilių, kad kvadratas ekrane atrodytų kvadratinis.
//  5. Prieš tai nupieštam kvadratui nupieškite raudonas istrižaines.

// for ($y = 0; $y < 100; $y++) {
//   for ($x = 0; $x < 100; $x++) {
//     if ($x == $y || $y == 99 - $x) {
//         echo "<span style='color: red; font-weight: bold; padding: 0 5px'>$x</span>";
//       } else {
//         echo '<span style="padding: 0 5px">*</span>';
//       }
//     }
//     echo "\n";
// }

//  6. Metam monetą. Monetos kritimo rezultatą imituojam rand() funkcija, kur 0 yra herbas, o 1 - skaičius. Monetos metimo rezultatus išvedame į ekraną atskiroje eilutėje: “S” jeigu iškrito skaičius ir “H” jeigu herbas. Suprogramuokite tris skirtingus scenarijus kai monetos metimą stabdome:
// a) Iškritus herbui;
// b) Tris kartus iškritus herbui;
// c) Tris kartus iš eilės iškritus herbui;

echo '<br> a) ';
do {
  $moneta = rand(0, 1);
  echo $rezultatas = $moneta === 1 ? 'S' : 'H';
} while ($rezultatas !== 'H');

echo '<br> b) ';

$kartai = 0;
do {
  $moneta = rand(0, 1);
  echo $rezultatas = $moneta === 1 ? 'S' : 'H';
  if ($rezultatas === 'H') $kartai++;
} while ($kartai < 3);

echo '<br> c) ';

$kartaiIsEiles = 0;
do {
  $moneta = rand(0, 1);
  echo $rezultatas = $moneta === 1 ? 'S' : 'H';
  if ($rezultatas === 'H' ) {
$kartaiIsEiles++;
  } else {
    $kartaiIsEiles = 0;
  }
} while ($kartaiIsEiles < 3);
echo '<br><br>';

// 7. Kazys ir Petras žaidžiai Bingo. Petras surenka taškų kiekį nuo 10 iki 20, Kazys surenka taškų kiekį nuo 5 iki 25. Vienoje eilutėje išvesti žaidėjų vardus su taškų kiekiu ir “Partiją laimėjo: ​laimėtojo vardas​”. Taškų kiekį generuokite funkcija ​rand()​. Žaidimą laimi tas, kas greičiau surenka 222 taškus. Partijas kartoti tol, kol kažkuris žaidėjas pirmas surenka 222 arba daugiau taškų. Nenaudoti cikle break.

$PetroTaskai = 0;
$KazioTaskai = 0;
do {
  $PetroTaskai += rand(10, 20);
  $KazioTaskai += rand(5, 25);
  $laimetojas = $PetroTaskai > $KazioTaskai ? 'Petras' :($KazioTaskai > $PetroTaskai ? 'Kazys' : 'Niekas nelaimejo, lygiosios.'); 
  
} while($PetroTaskai <= 222 && $KazioTaskai <= 222);

echo 'Petras: ' .$PetroTaskai;
echo ', ';
echo 'Kazys: ' .$KazioTaskai;
echo '. ';
echo "Laimetojas: $laimetojas";
echo '<br><br>';

// 8. Reikia nupaišyti pilnavidurį rombą, taip pat, kaip ir pilnavidurį kvadratą (https://lt.wikipedia.org/wiki/Rombas), kurio aukštis 21 eilutė. Reikia padaryti, kad kiekviena rombo žvaigždutė būtų atsitiktinės RGB spalvos (perkrovus puslapį spalvos turi keistis).

// Pirmas variantas
echo '<div style= "display: inline-block; text-align: center; margin: 0 20px;">';
for ($y = 0; $y <= 11; $y++) {
  for ($x = 11; $x >= $y; $x--) {
      echo ' ';
  }
  for ($z = 1; $z <= $y; $z++) {
    echo '<span style="color: rgb('.rand(0, 255) .',' .rand(0, 255) .',' .rand(0, 255) .'); padding: 0 5px;">*</span>';
  }
  echo '<br>';
}

for ($y = 10; $y >= 1; $y--) {
  for ($x = 11; $x >= $y; $x--) {
    echo ' ';
  }
  for ( $z = 1; $z <= $y; $z++) {
    echo '<span style="color: rgb('.rand(0, 255) .',' .rand(0, 255) .',' .rand(0, 255) .'); padding: 0 5px;">*</span>';
  }
echo '<br>';
}
echo '</div>';

// Antras variantas
echo '<p style="display: inline-block; text-align:center;">';
for($I=0;$I<=10;$I++){
  echo str_repeat('<span style="padding: 0 5px; color: rgb('.rand(0, 255) .','.rand(0, 255) .','.rand(0, 255) .')">*</span>',$I);
  echo '<br />';
}
 
for($D=11;$D>=1;$D--){
  echo str_repeat('<span style="padding: 0 5px; color: rgb('.rand(0, 255) .',' .rand(0, 255) .',' .rand(0, 255) .')">*</span>',$D);
  echo '<br />';
}
 
echo '</p>';

// 10. Sumodeliuokite vinies kalimą. Įkalimo gylį sumodeliuokite pasinaudodami rand() funkcija. Vinies ilgis 8.5cm (pilnai sulenda į lentą).
// a) “Įkalkite” 5 vinis mažais smūgiais. Vienas smūgis vinį įkala 5-20 mm. Suskaičiuokite kiek reikia smūgių.
// b) “Įkalkite” 5 vinis dideliais smūgiais. Vienas smūgis vinį įkala 20-30 mm, bet yra 50% tikimybė (pasinaudokite rand() funkcija tikimybei sumodeliuoti), kad smūgis nepataikys į vinį. Suskaičiuokite kiek reikia smūgių.

// a) variantas
echo '<pre>';
$viniesIlgis = 85;
$viniuIlgis = 5 * $viniesIlgis;
$smugis = 0;

do {
echo $viniuIlgis -= rand(5, 20);
$smugis++;
echo ' mm.<br>';
} while($viniuIlgis > 0);

echo "Ikalti 5 vinis mazais smugiais reikia $smugis smugiu.";

// b) variantas
echo '<pre>';
$viniuIlgis2 = 5 * $viniesIlgis;
$smugis2 = 0;

do {
  // if (rand(0, 1) == 1) {
  //   $viniuIlgis2 -= rand(20, 30);
  //   $smugis2++;
  // } else {
  //   $viniuIlgis2 -= 0;
  //   $smugis2++;
  // }

  echo $viniuIlgis2 -= rand(0, 1) == 1 ? rand(20, 30) : 0; 
  $smugis2++;
  echo ' mm.<br>';
} while ($viniuIlgis2 > 0);

echo "Ikalti 5 vinis dideliais smugiais reikia $smugis2 smugiu.";

// 11. Sugeneruokite stringą, kurį sudarytų 50 atsitiktinių skaičių nuo 1 iki 200, atskirtų tarpais. Skaičiai turi būti unikalūs (t.y. nesikartoti). Sugeneruokite antrą stringą, pasinaudodami pirmu, palikdami jame tik pirminius skaičius (t.y tokius, kurie dalinasi be liekanos tik iš 1 ir patys savęs). Skaičius stringe sudėliokite didėjimo tvarka, nuo mažiausio iki didžiausio.

echo '<br>';
$skaiciuMasyvas = [];

// Unikaliu skaiciu Stringas
do {
  $len = count($skaiciuMasyvas);

  array_push($skaiciuMasyvas, rand(1, 200));
  $skaiciuMasyvas = array_values(array_unique($skaiciuMasyvas));

} while ($len < 50);

// print_r($skaiciuMasyvas);
sort($skaiciuMasyvas);

echo'Pirmas stringas is 50 unikaliu ats skaiciu: ' .implode(' ', $skaiciuMasyvas);

// Pirminiu skaiciu Stringas
echo '<br>Masyvo ilgis: ' .$len = count($skaiciuMasyvas);

$pirminiaiSkaiciai = '';

// for ($i = 0; $i < $len ; $i++) {
//   $number = $skaiciuMasyvas[$i];
//   $prime = 1;
  
//     for ($j = 2; $j <= $number/2; $j++ ) {
//       if ($number % $j == 0) $prime = 0;
//     }

//   if ($prime) $pirminiaiSkaiciai .= $number .', ' ;
// }

foreach($skaiciuMasyvas as $number) {
  $prime = 1;
  for ($i = 2; $i <= $number/2; $i++) {
    if ($number % $i == 0) $prime = 0;
  }
  if ($prime) $pirminiaiSkaiciai .= $number .', ';
}

echo'<br>Antras stringas is pirminiu skaiciu: ' .chop($pirminiaiSkaiciai, ', ');