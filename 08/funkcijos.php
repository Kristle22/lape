<?php

// 1. Parašykite funkciją, kurios argumentas būtų tekstas, kuris yra įterpiamas į h1 tagą;

function h1($text) {
  echo "<h1>$text</h1>";
}

h1('Laba diena!');

// 2. Parašykite funkciją su dviem argumentais, pirmas argumentas tekstas, įterpiamas į h tagą, o antrasis tago numeris (1-6). Rašydami šią funkciją remkitės pirmame uždavinyje parašytą funkciją;

function tagH($text, $num) {
  echo "<h$num>$text</h$num>";
}

tagH('Laba diena!', 5);

// 3. Generuokite atsitiktinį stringą, pasinaudodami kodu md5(time()). Visus skaitmenis stringe įdėkite į h1 tagą. Raides palikite. Jegu iš eilės eina keli skaitmenys, juos į tagą reikią dėti kartu (h1 atsidaro prieš pirmą ir užsidaro po paskutinio) Keitimui naudokite pirmo patobulintą (jeigu reikia) uždavinio funkciją ir preg_replace_callback();

echo 'Kodas: ' .$md5 = md5(time());
$pattern = '/\d+/';
echo '<pre>Digits: ';

function boldNums($code) {
  print_r($code);
  return "<h1 style='display: inline-block; padding: 0 3px;'>$code[0]</h1>";
}

$result = preg_replace_callback($pattern, 'boldNums', $md5);

echo '<br>Result: ' .$result;

// 4. Parašykite funkciją, kuri skaičiuotų, iš kiek sveikų skaičių jos argumentas dalijasi be liekanos (išskyrus vienetą ir patį save) Argumentą užrašykite taip, kad būtų galima įvesti tik sveiką skaičių;

echo '<br>';

function countDivisors($num) {
  $count = 0;
  $divisors = [];
  if (is_int($num)) {
    foreach(range(2, $num/2) as $val) {
      if ($num % $val == 0) {
    $count++;
    $divisors[] = $val; 
      }
    }
  } else {
    echo 'Please enter whole number.';
  }
  // print_r($divisors);
  echo "Divisors of $num: " .$count .'<br>';
  return $count;
}

countDivisors(98);

// 5. Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 33 iki 77. Išrūšiuokite masyvą pagal daliklių be liekanos kiekį mažėjimo tvarka, panaudodami ketvirto uždavinio funkciją.

echo '<br>';
$array = [];

foreach(range(1,100) as $key => $el) {
  $array[$el] = rand(33,77);
}

// print_r($array);
usort($array, function($a, $b) {
  return countDivisors($b) <=> countDivisors($a);
});

print_r($array);

// 6. Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 333 iki 777. Naudodami 4 uždavinio funkciją iš masyvo ištrinkite pirminius skaičius.

$array2 = [];

foreach(range(1,100) as &$el) {
  $array2[$el] = rand(333, 777);
  if (countDivisors($array[$el]) == 0) {
    unset($array2[$el]);
    }
}

print_r($array2);

// 7. Sugeneruokite atsitiktinio (nuo 10 iki 20) ilgio masyvą, kurio visi, išskyrus paskutinį, elementai yra atsitiktiniai skaičiai nuo 0 iki 10, o paskutinis masyvas, kuris generuojamas pagal tokią pat salygą kaip ir pirmasis masyvas. Viską pakartokite atsitiktinį nuo 10 iki 30  kiekį kartų. Paskutinio masyvo paskutinis elementas yra lygus 0;