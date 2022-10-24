<?php

$masyvas = array(); //<======= pries 15 metu
$masyvas = []; //<======= dabartine sintakse

$sk = rand(0, 10);
while ($sk < 9) {
   echo $sk . ' cikle<br>';
   $sk = rand(0, 10);
}

echo "Pabaiga $sk <br>";
echo '-----------------------<br>';
do {
   $sk = rand(0, 10);
echo $sk . ' cikle<br>';
} while ($sk < 9);

echo "Pabaiga $sk <br>";
echo '-----------------------<br>';

for ($x = 1; $x <= 5; $x++) {
   echo 'Numeris: '.$x.' <br>';
}
echo '-----------------------<br>';

// 1.Uzdavinys
echo $sriuba = rand(260, 300); //ml sriubos
echo ' ml sriubos.<pre>';
$saukstuKiekis = 0; // Vienas saukstas: 7-10 ml
$vienasSaukstas = rand(7, 10);

while ($sriuba > 0 && $sriuba > $vienasSaukstas) {
$sriuba -= $vienasSaukstas;
$vienasSaukstas = rand(7, 10);
echo $vienasSaukstas .' ml.<br>';
$saukstuKiekis++;
}

// 2 spr. variantas
do {
   $saukstuKiekis++;
   $sriuba -= min(rand(7, 10), $sriuba);
   $pasemta = rand(7, 10); 
   // $sriuba -= $pasemta > $sriuba ? $sriuba : $pasemta;
   // if ($pasemta > $sriuba) {
   //    $sriuba = $sriuba - $sriuba; 
   // } else {
   //    $sriuba = $sriuba - $pasemta;
   // }
} while ($sriuba > 0);

echo '<br>' .$saukstuKiekis .' saukstai';
echo "<br>Liko $sriuba ml sriubos.<br>";
echo '----------------------------<br>';
// 2.Uzdavinys
echo $kepsnys = rand(300, 350); //g mesos
echo ' g mesos.';
$sakuciuKiekis = 0;
$krimstelejimuKiekis = 0;
// Viena sakute pasmeigia 7-10 g kepsnio
// Vienas krimstelejimas sukramto 4-6 g kepsnio
do {
   $sakuciuKiekis++;
   $gabalas = rand(7, 10);
   $kepsnys -= min($gabalas, $kepsnys);
   echo '<br>' .$gabalas .' g.';
   while ($gabalas > 0) {
      $gabalas -= min(rand(4, 6), $gabalas);
      $krimstelejimuKiekis++;
      echo '<pre>' .$krimstelejimuKiekis .' krimst. ==> cikle</pre>';
   }
} while ($kepsnys > 0);

echo '<br>' .$sakuciuKiekis .' saukuciu.';
echo '<br>' .$krimstelejimuKiekis .' krimstelejimai.';
echo "<br>Liko $kepsnys g kepsnio.";