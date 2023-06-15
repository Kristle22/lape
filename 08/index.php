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
function sudeti(int $vienas, int $du) : array
{
  global $naujesnis;
  echo $GLOBALS['senas'] .'<br>';
  echo $naujesnis .'<br>';

//  echo $v .'<br>';
 $ura = 'Ura';

  if ($du === 8) {
   return $ura;
  }
   $rezultatas = $vienas + $du;
   return [$rezultatas, $ura];
}

// Kvietimas
$labas = 7;

$mas = [77, 23];

$re = sudeti(...$mas);

var_dump($re[0]);
echo $re[1] .'<br>';


function foo() {
  static $index = 0;
  $index++;
  echo "$index<br>";
}

foo();
foo();
foo();


$greet = function($name)
{
    printf("Hello %s", $name);
};
$greet('World');
echo '<br>';
$greet('PHP');

$masyvas = [
  ['a','d'],
  ['v','e'],
  ['a','c'],
  ['s','r'],
];

function antanas($a, $b) {
  return $a[0] <=> $b[0];
}

$antanina = function($a, $b) {
  return $a[0] <=> $b[0];
};

usort(
  $masyvas, 
  // function($a, $b){return $a[0] <=> $b[0];}
  // 'antanas'
  // $antanina
  fn($a, $b) => $a[0] <=> $b[0]
);

echo '<pre>';
print_r($masyvas);

$result = 88;
$one = function()
{ var_dump($result); };
 
$two = function() use ($result)
{ var_dump($result); };
 
$three = function() use (&$result)
{ var_dump($result); };
 
$result++;
 
$one();    // NULL: $result nepasiekiamas
$two();    // int(0): $result nukopijuojamas
$three();    // int(1) $result pagal reference


function recursive($num){
  echo 'Pradzia: ' .$num, '<br>';
  if($num < 5){
      //Kviečiame save. Padidiname numerį vienetu.
      recursive($num + 1);
  }
  echo 'Pabaiga: ' .$num, '<br>';
}
$startNum = 1;
recursive($startNum);

// Callback'as
function funSum($a, $b) {
  return $b($a);
}

echo '<br>';
echo funSum(5, fn($x) => $x * 3);

echo '<br>';
echo funSum(5, fn($x) => ++$x);

function meska($c) {
  return $c * 10;
} 

echo '<br>';
echo funSum(5, 'meska');

function zuikis() {
  return fn() => 123;
}

echo '<br>';
echo zuikis()();

// Arrow fn
$zuikis1 = fn() => fn($a) => 123 + $a;

echo '<br>';
echo $zuikis1()(7);

$m = [$zuikis1];

echo '<br>';
echo $m[0]()(7);

// preg_replace_callback-regex

echo preg_replace_callback(
  '/\.(.*)\./',
  'ieskok',
  'bvhdbvhdzfgvzh.bdj'.rand(1000, 9999).'.bvdjsbvhsj48773nbdfskbns676n6768dfkjbnkj'
);

echo '<br>';

function ieskok($m) {
  print_r($m);
  return '<b><u>'.$m[1].'</u></b>';
}

// Funkciju foreachinimas
$fnMas = [];
foreach(range(1, 3) as $fn) {
  $fnMas[1] = fn($a) => $a * 3; 
  $fnMas[2] = fn($a) => $a * 5;
  $fnMas[3] = fn($a) => $a * 7; 
}
// arba
// array_push($fnMas,
// fn($a) => $a * 3,
// fn($a) => $a * 5,
// fn($a) => $a * 7,
// );

echo'<br>Skaicius: ';
echo $rand = rand(100, 999); echo'<br>';

foreach($fnMas as $k => $fn) {
   echo $fnMas[$k] = $fn($rand) .'<br>';
}

// arba
// foreach($fnMas as &$fn) {
//    echo $fn = $fn($rand) .'<br>';
// }

print_r($fnMas);