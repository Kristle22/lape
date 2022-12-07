<?php


$a = 0.5;
$b = 0.7;
$c = 15;
$d = -0.77777777;

// deklaracija
function nr1($par1, $par2) {
  $ats = cos($par1) * cos($par2) * sin($par2);
echo '<br>' .$ats;
return $ats;
}

function nr2($par1, $par2) {
  $ats = $par1 * tan($par2);
echo '<br>' .$ats;
return $ats;
}

// 1.
$d1 = cos($a) * cos($b) * sin($b);
echo '<br>' .$d1;

// 2.
$d2 = $d1 * tan($c);
echo '<br>' .$d2;

// 3.
$d3 = cos($d2) * cos($d) * sin($d);
echo '<br>' .$d3;

// 4.
$d4 = $d3 * tan($c);
echo '<br>' .$d4;

echo '<br><br><br>';
// 1.
$d1 = nr1($a, $b); //kvietimas
// 2.
$d2 = nr2($d1, $c);
// 3.
$d3 = nr1($d2, $d);
// 4.
$d4 = nr2($d3, $c);

echo '<br><br><br>';

$valio = 'Valio';
$senas = 'Senas';
$naujesnis = 'Naujesnis';

// Deklaracija
function sudeti($vienas, $du, $v)
{
  global $naujesnis;
  echo $GLOBALS['senas'] .'<br>';
  echo $naujesnis .'<br>';

 echo $v .'<br>';
 $ura = 'Ura';

  if ($du === 8) {
   return;
  }
   $rezultatas = $vienas + $du;
   return [$rezultatas, $ura];
}

// Kvietimas
$labas = 7;
$re = sudeti($labas, 10, $valio);

var_dump($re[0]);
echo $re[1];